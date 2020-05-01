<?php

namespace App\Http\Controllers\Admin\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Operation\BookingAndReservationRequest;
use App\Model\Admin\Configuration\Venue;
use App\Model\Customer;
use App\Model\Customer\CustomerBooking;
use App\Model\Menu;
use Illuminate\Http\Request;

class BookingAndReservationController extends Controller
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
        $customers = Customer::get();
        return view('Admin.Operation.booking_and_reservation', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage',
            'venues',
            'customers'
        ));
    }

    public function gets($dateFrom, $dateTo, $startDate, $endDate, $status, $venueId, $customerId, $recordPerPage)
    {
        $dateFrom = $dateFrom !== 'null' ? date('Y-m-d', strtotime($dateFrom)) . ' 00:00:00' : $dateFrom;
        $dateTo = $dateTo !== 'null' ? date('Y-m-d', strtotime($dateTo)) . ' 23:59:59' : $dateTo;

        $startDate = $startDate !== 'null' ? date('Y-m-d', strtotime($startDate)) . ' 00:00:00' : $startDate;
        $endDate = $endDate !== 'null' ? date('Y-m-d', strtotime($endDate)) . ' 23:59:59' : $endDate;

        $response = CustomerBooking::
        where(function ($query) use ($dateFrom, $dateTo, $startDate, $endDate, $status, $venueId, $customerId) {
            if ($status !== 'null') {
                $query->where('status', $status);
            }
            if ($venueId !== 'null') {
                $query->where('venue_id', $venueId);
            }

            if ($customerId !== 'null') {
                $query->where('customer_id', $customerId);
            }

            if ($dateFrom !== 'null' && $dateTo !== 'null') {
                $query->whereBetween('created_at', [$dateFrom, $dateTo]);
            }

            if ($startDate !== 'null') {
                $query->where('starting_date_time', '>=', $startDate);
                if ($endDate !== 'null') {
                    $query->where('ending_date_time', '<=', $endDate);
                }
            }
            if ($endDate !== 'null') {
                $query->where('ending_date_time', '<=', $endDate);
                if ($startDate !== 'null') {
                    $query->where('starting_date_time', '>=', $startDate);
                }
            }

        })
            ->with('customer')
            ->with('venue')
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function get($id)
    {

        $response = CustomerBooking::where('id', $id)->with('customer')->with('venue')->first();
        return response()->json($response);
    }

    public function save(BookingAndReservationRequest $request)
    {
        $data = CustomerBooking::find($request->get('id'));
        $data->arrival_date_time = $request->get('arrival_date_time');
        $data->starting_date_time = $request->get('starting_date_time');
        $data->ending_date_time = $request->get('ending_date_time');
        $totalHour = (strtotime($request->get('ending_date_time')) - strtotime($request->get('starting_date_time')))/(60*60);
        $data->total_hour = $totalHour;
        $data->number_of_children = $request->get('number_of_children');
        $data->number_of_adult = $request->get('number_of_adult');
        $data->price_per_hour = $request->get('price_per_hour');
        $data->cleaning_fee = $request->get('cleaning_fee');
        $data->city_fee = $request->get('city_fee');
        $data->security_deposit_amount = $request->get('security_deposit_amount');
        $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
        $data->updated_by = session('id');
        $data->save();
        return response()->json($data);
    }

    public function delete(Request $request)
    {

        CustomerBooking::where('id', $request->get('id'))->delete();
        return response()->json('Customer Booking Deleted Successfully');
    }

}
