<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Model\Admin\Configuration\Venue;
use App\Model\Customer;
use App\Model\Customer\CustomerBooking;
use App\Model\Menu;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('Admin.Report.booking_and_reservation', compact(
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

    public function gets($dateFrom, $dateTo, $startDate, $endDate, $status, $venueId, $customerId)
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
            ->get();
        return response()->json($response);
    }

    public function generateReport(Request $request)
    {
        $dateFrom = $request->get('date_from');
        $dateTo = $request->get('date_to');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $status = $request->get('status');
        $venueId = $request->get('venue_id');
        $customerId = $request->get('customer_id');

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
            ->get();
        $pdf = PDF::loadView('Admin.Report.booking_and_reservation_pdf', compact('response'));
        Storage::disk('public')->put('report/booking_and_reservation_report.pdf', $pdf->output()) ;
        return response()->json(asset('storage/report/booking_and_reservation_report.pdf'));
    }
}
