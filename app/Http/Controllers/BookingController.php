<?php

namespace App\Http\Controllers;

use App\Model\Admin\Configuration\Venue;
use App\Model\Admin\Operation\BlockedBookingDate;
use App\Model\Customer\CustomerBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $title = 'Venue Booking | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Venue Booking';
        $page = '';
        $venues = Venue::where('status', 'Active')->get();
        return view('booking', compact('title', 'venues', 'activeNav', 'page'));

    }

    public function getVenueById($venueId)
    {
        $title = 'Venue | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Venue Booking';
        $page = '';
        $venue = Venue::where('id', $venueId)->first();
        return view('venue', compact('title', 'venue', 'activeNav', 'page'));
    }

    public function getCustomerVenueBookingById($venueId)
    {
        $response['bookingsAndReservations'] = CustomerBooking::where('venue_id', $venueId)->whereIn('status', ['Booked', 'Reserved'])->with('venue')->get();
        $response['blockedBookingDates'] = BlockedBookingDate::where('venue_id', $venueId)->where('status', 'Active')->get();
        return response()->json($response);
    }
}
