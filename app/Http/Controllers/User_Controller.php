<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_Controller extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }
    public function user()
    {
        return view('profile/profile');
        // dd(Auth::user()->id);
    }
}
