<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home | Hornsby Baha’i Centre of Learning';
        $activeNav = 'Home';
        $page = '';

        return view('home', compact('title', 'activeNav', 'page'));
    }

}
