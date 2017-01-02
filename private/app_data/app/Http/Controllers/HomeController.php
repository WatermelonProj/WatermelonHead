<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vendor\Laravel\Framework\src\Illuminate\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        print_r(\Auth::user());
        return view('default.home');
    }
}
