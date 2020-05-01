<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Customer\CustomerBooking;
use Illuminate\Http\Request;

class BookingConfirmationController extends Controller
{
    public function index($customerBookingId)
    {
        $title = 'Booking Confirmation | Hornsby Baha’i Centre of Learning';
        $activeNav = '';
        $page = '';
        $customerBooking = CustomerBooking::where('id', $customerBookingId)->with('venue')->first();
        return view('Customer.booking_confirmation', compact('customerBooking', 'title', 'activeNav', 'page'));
    }
}
