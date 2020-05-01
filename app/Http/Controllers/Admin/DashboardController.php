<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Operation\BlockedBookingDate;
use App\Model\Customer\CustomerBooking;
use App\Model\Menu;
use App\Model\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | Hornsby Baha’i Centre of Learning';
        $activeMenuValue = 'Dashboard';
        $activeMenuId = Menu::where('menu', $activeMenuValue)->first()->id;
        $firstLevelMenus = Menu::where('root_id', 0)->where('status', 'Active')->get();
        return view('Admin.dashboard', compact('title', 'activeMenuId', 'firstLevelMenus'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('system/login');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => [
                'required',
                function($attribute, $value, $fail) {
                    if (empty(User::where('id', session('session_id'))->where('password', sha1($value))->first())) {
                        $fail('Invalid Current Password Found!');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'confirmed'
            ]
        ]);

        User::where('id', session('session_id'))->update(['password' => sha1($request->get('password'))]);
        return response()->json('Password Changed Successfully');

    }

    public function getVenueBookingsAndReservations()
    {
        $response['bookingsAndReservations'] = CustomerBooking::whereIn('status', ['Booked', 'Reserved'])->with('venue', 'customer')->get();
        $response['blockedBookingDates'] = BlockedBookingDate::where('status', 'Active')->get();
        return response()->json($response);
    }
}
