<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Customer\CustomerBooking;
use App\Model\CustomerMenu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Dashboard';
        $page = '';
        $activeMenuValue = 'Dashboard';
        $activeMenuId = CustomerMenu::where('menu', $activeMenuValue)->first()->id;
        $firstLevelMenus = CustomerMenu::where('root_id', 0)->where('status', 'Active')->get();
        $bookings = CustomerBooking::where('customer_id', session('session_id'))->where('status', 'Booked')->with('venue')->with('customer')->get();
        $reservations = CustomerBooking::where('customer_id', session('session_id'))->where('status', 'Reserved')->with('venue')->with('customer')->get();
        return view('Customer.dashboard', compact('title', 'activeMenuId', 'activeMenuValue', 'firstLevelMenus', 'bookings', 'reservations', 'activeNav', 'page'));

    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
