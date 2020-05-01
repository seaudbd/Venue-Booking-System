<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;

use App\Model\Customer;
use App\Model\User;
use Illuminate\Http\Request;




class LoginController extends Controller
{
    public function index()
    {
        $title = 'Log in | Hornsby Bahá’í Centre of Learning';
        $activeNav = 'Log in';
        $page = '';
        return view('login', compact('title', 'activeNav', 'page'));
    }

    public function login(LoginRequest $request)
    {
        $loginData = $request->except('_token');
        $loginData['password'] = sha1($loginData['password']);
        $customer = Customer::where($loginData)->first();
        if ($customer) {
            session([
                'login_status' => true,
                'session_id' => $customer->id,
                'login_id' => $customer->login_id,
                'name' => $customer->name,
                'photo' => $customer->photo,
                'user_status' => $customer->status
            ]);
            return response()->json('Authorized Customer Access');
        }
        return response()->json('Unauthorized Access!');
    }

    public function forgotPassword()
    {
        $title = 'Forgot Password | Hornsby Bahá’í Centre of Learning';
        $activeNav = '';
        $page = '';
        return view('forgot_password', compact('title', 'activeNav', 'page'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'verification_code' => [
                'required',
                'max:6',
                'min:6'
            ],
            'login_id' => [
                'required',
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'confirmed'
            ]
        ]);
        $customer = Customer::where('login_id', $request->get('login_id'))->where('verification_code', $request->get('verification_code'))->first();
        if ($customer) {
            Customer::where('id', $customer->id)->update(['password' => sha1($request->get('password')), 'verification_code' => '---']);
            return response()->json('Resetting Password Successful');
        } else {
            return response()->json('Invalid Verification Code Found!');
        }
    }


    public function loadAdminLogin()
    {
        $title = 'System Log in | Hornsby Bahá’í Centre of Learning';
        $activeNav = '';
        $page = '';
        return view('system_login', compact('title', 'activeNav', 'page'));
    }

    public function authenticateAdminLogin(LoginRequest $request)
    {
        $loginData = $request->except('_token');
        $loginData['password'] = sha1($loginData['password']);
        $user = User::where($loginData)->first();
        if ($user) {
            session([
                'login_status' => true,
                'session_id' => $user->id,
                'login_id' => $user->login_id,
                'name' => $user->name,
                'photo' => $user->photo,
                'user_status' => $user->status
            ]);
            return response()->json('Authorized Admin Access');
        }
        return response()->json('Unauthorized Access!');
    }

}
