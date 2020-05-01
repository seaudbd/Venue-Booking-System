<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PasswordUpdateRequest;
use App\Http\Requests\Customer\ProfileUpdateRequest;
use App\Model\Customer;
use App\Model\CustomerMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile | Hornsby Baha’i Centre of Learning';
        $activeNav = '';
        $page = '';
        $activeMenuValue = 'Profile';
        $activeMenuId = CustomerMenu::where('menu', $activeMenuValue)->first()->id;
        $firstLevelMenus = CustomerMenu::where('root_id', 0)->where('status', 'Active')->get();
        $customer = Customer::where('id', session('session_id'))->first();
        return view('Customer.profile', compact('title', 'activeMenuId', 'activeMenuValue', 'firstLevelMenus', 'customer', 'activeNav', 'page'));

    }

    public function updateProfileInformation(ProfileUpdateRequest $request)
    {
        $customer = Customer::find(session('session_id'));
        if ($request->has('photo')) {
            if ($customer->photo !== '---') {
                Storage::disk('public')->delete($customer->photo);
            }
            $customer->photo = $request->file('photo')->storeAs('customer/photo', time() . '.' . $request->file('photo')->getClientOriginalExtension(), 'public');
        }
        $customer->name = $request->get('name');
        $customer->email = $request->get('email');
        $customer->contact_number = $request->get('contact_number') !== null ? $request->get('contact_number') : '---';
        $customer->save();
        return response()->json('Profile Information Updated Successfully');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $customer = Customer::find(session('session_id'));
        $customer->password = sha1($request->get('password'));
        $customer->save();
        return response()->json('Password Updated Successfully');
    }
}
