<?php

namespace App\Http\Controllers\Admin\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Operation\BlockedBookingDateBulkRequest;
use App\Http\Requests\Admin\Operation\BlockedBookingDateSingleRequest;
use App\Model\Admin\Configuration\Venue;
use App\Model\Admin\Operation\BlockedBookingDate;
use App\Model\Menu;
use Illuminate\Http\Request;

class BlockedBookingDateController extends Controller
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
        $venues = Venue::where('status', 'Active')->get();
        return view('Admin.Operation.blocked_booking_date', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage',
            'venues'
        ));
    }

    public function gets($searchString, $recordPerPage)
    {
        $response = BlockedBookingDate::
            where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('date', 'like', '%' . $searchString . '%');
                    $query->orWhere('start_time', 'like', '%' . $searchString . '%');
                    $query->orWhere('end_time', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
            })
            ->with('venue')
            ->paginate($recordPerPage);
        return response()->json($response);
    }


    public function saveSingle(BlockedBookingDateSingleRequest $request)
    {
        $data = $request->get('id') === null ? new BlockedBookingDate() : BlockedBookingDate::find($request->get('id'));
        $data->date = date_create(date('Y-m-d', strtotime($request->get('date'))));
        $data->venue_id = $request->get('venue_id');
        $data->start_time = $request->get('start_time');
        $data->end_time = $request->get('end_time');
        $data->background_color = $request->get('background_color');
        $data->text_color = $request->get('text_color');
        $data->status = $request->get('status');
        $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
        $request->get('id') === null ? $data->created_by = session('id') : $data->updated_by = session('id');
        $data->save();
        return response()->json($data);
    }

    public function saveBulk(BlockedBookingDateBulkRequest $request)
    {
        $startDate = strtotime('01 Jan ' . $request->get('year'));
        $endDate = strtotime('31 Dec ' . $request->get('year'));
        $dates = [];
        while(1) {
            $startDate = strtotime('next ' . strtolower($request->get('day')), $startDate);
            if ($startDate > $endDate) {
                break;
            }
            array_push($dates, date('Y-m-d', $startDate));
        }

        foreach ($dates as $key => $date) {
            if ( empty(BlockedBookingDate::
                    where('venue_id', $request->get('venue_id'))
                    ->where('date', $date)
                    ->where(function ($query) use ($request) {
                        $query->where('start_time', '<=', $request->get('start_time'));
                        $query->where('end_time', '>=', $request->get('start_time'));
                    })->first()) &&
                empty(BlockedBookingDate::
                    where('venue_id', $request->get('venue_id'))
                    ->where('date', $date)
                    ->where(function ($query) use ($request) {
                        $query->where('start_time', '<=', $request->get('end_time'));
                        $query->where('end_time', '>=', $request->get('end_time'));
                    })
                    ->first()) &&
                empty(BlockedBookingDate::
                    where('venue_id', $request->get('venue_id'))
                    ->where('date', $date)
                    ->whereBetween('start_time', [$request->get('start_time'), $request->get('end_time')])
                    ->first()) &&
                empty(BlockedBookingDate::
                    where('venue_id', $request->get('venue_id'))
                    ->where('date', $date)
                    ->whereBetween('end_time', [$request->get('start_time'), $request->get('end_time')])
                    ->first())) {
                $data = new BlockedBookingDate();
                $data->date = $date;
                $data->venue_id = $request->get('venue_id');
                $data->start_time = $request->get('start_time');
                $data->end_time = $request->get('end_time');
                $data->background_color = $request->get('background_color');
                $data->text_color = $request->get('text_color');
                $data->status = $request->get('status');
                $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
                $data->created_by = session('id');
                $data->save();
            }


        }

        return response()->json('Bulk Blocked Booking Dates Saved Successfully');
    }

    public function get($id)
    {
        $response = BlockedBookingDate::where('id', $id)->first();
        return response()->json($response);
    }

    public function delete(Request $request)
    {
        BlockedBookingDate::where('id', $request->get('id'))->delete();
        return response()->json('Blocked Booking Date Deleted Successfully');
    }


    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            BlockedBookingDate::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }
}
