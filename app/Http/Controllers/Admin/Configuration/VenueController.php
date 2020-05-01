<?php

namespace App\Http\Controllers\Admin\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Configuration\VenueRequest;
use App\Model\Admin\Configuration\Venue;
use App\Model\Admin\Configuration\VenueOpeningHour;
use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function index($id)
    {
        $firstLevelMenus = Menu::where('root_id', 0)->where('status', 'Active')->get();
        $operationLists = explode(',', Menu::where('id', $id)->first()->operation_list);
        $finalOperationLists = [];
        foreach ($operationLists as $operationList) {
            $temp = explode(':', $operationList);
            $finalOperationLists[$temp[0]] = $temp[1];
        }
        $activeMenuValue = $finalOperationLists['activeMenuValue'];
        $activeSubMenuValue = $finalOperationLists['activeSubMenuValue'];
        $title = $activeSubMenuValue . ' | Hornsby Baha’i Centre of Learning';
        $activeMenuId = $finalOperationLists['activeMenuId'];
        $activeSubMenuId = $finalOperationLists['activeSubMenuId'];
        $recordPerPage = $finalOperationLists['recordPerPage'];
        return view('Admin.Configuration.venue', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage'
        ));
    }


    public function gets($searchString, $recordPerPage)
    {
        $response = Venue::
        where(function ($query) use ($searchString) {
            if ($searchString !== 'null') {
                $query->where('venue', 'like', '%' . $searchString . '%');
                $query->orWhere('status', 'like', '%' . $searchString . '%');
                $query->orWhere('narrative', 'like', '%' . $searchString . '%');
            }
        })
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function get($id)
    {
        $response = Venue::where('id', $id)->with('venueOpeningHours')->first();
        return response()->json($response);
    }

    public function save(VenueRequest $request)
    {

        $data = $request->get('id') === null ? new Venue() : Venue::find($request->get('id'));
        $number = Venue::max('number');
        if ( ! empty($number)) {
            $number = $number + 1;
        } else {
            $number = 5001;
        }
        $data->venue = $request->get('venue');
        $data->type = $request->get('type');
        $data->number = $number;
        $data->price_per_hour = $request->get('price_per_hour');
        $data->security_deposit_amount = $request->get('security_deposit_amount');
        $data->number_of_rooms = $request->get('number_of_rooms');
        $data->number_of_seats = $request->get('number_of_seats');
        $data->number_of_guests = $request->get('number_of_guests');
        $data->cleaning_fee = $request->get('cleaning_fee') === null ? 0 : $request->get('cleaning_fee');
        $data->city_fee = $request->get('city_fee') === null ? 0 : $request->get('city_fee');
        $data->refund_policy = $request->get('refund_policy') === null ? '---' : $request->get('refund_policy');
        $data->are_children_allowed = $request->get('are_children_allowed');
        $data->is_additional_guest_allowed = $request->get('is_additional_guest_allowed');
        $data->is_smoking_allowed = $request->get('is_smoking_allowed');
        $data->is_party_allowed = $request->get('is_party_allowed');
        $data->is_pet_allowed = $request->get('is_pet_allowed');
        $data->background_color = $request->get('background_color');
        $data->text_color = $request->get('text_color');
        $data->status = $request->get('status');
        $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
        $request->get('id') === null ? $data->created_by = session('id') : $data->updated_by = session('id');
        $data->save();

        if ($request->has('image')) {
            if ($request->get('id') !== null) {
                $images = explode(',', $data->image);
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $imagePath = '';
            foreach ($request->image as $key => $file) {
                $imagePath .= $file->storeAs('venue', $data->id . '_' . ++$key . '_' . time() . '.' . $file->getClientOriginalExtension(), 'public') . ',';
            }
            $data->image = substr($imagePath, 0, -1);
        } elseif ($request->get('id') === null){
            $data->image = '---';
        }
        $data->save();


        VenueOpeningHour::where('venue_id', $data->id)->delete();
        $nameOfDays = $request->get('name_of_day');
        $openingTimes = $request->get('opening_time');
        $closingTimes = $request->get('closing_time');
        foreach ($nameOfDays as $key => $nameOfDay) {
            if ($nameOfDay !== null && $openingTimes[$key] !== null && $closingTimes[$key] !== null) {
                VenueOpeningHour::create([
                    'venue_id' => $data->id,
                    'name_of_day' => $nameOfDay,
                    'opening_time' => $openingTimes[$key] . ':00',
                    'closing_time' => $closingTimes[$key] . ':00',
                    'status' => 'Active',
                    'narrative' => '---',
                    'created_by' => session('session_id')
                ]);
            }
        }

        return response()->json($data);
    }

    public function deleteImage(Request $request)
    {
        $venue = Venue::where('id', $request->get('id'))->first();
        $venueImages = explode(',', $venue->image);
        foreach ($venueImages as $key => $venueImage) {
            if ($venueImage == $request->get('image_path')) {
                Storage::disk('public')->delete($venueImage);
                unset($venueImages[$key]);
                break;
            }
        }
        Venue::where('id', $request->get('id'))->update(['image' => count($venueImages) > 0 ? implode(',', $venueImages) : '---']);
        return response()->json('Image Deleted Successfully');
    }


    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            Venue::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }
}
