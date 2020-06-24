<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guest()) {
            return view('pages.welcome');
        }

        if (Auth::user()) {
            $status = Auth::user()->status;
            if ($status == 'admin') {
                return view('admin.index');
            } else {
                return view('pages.welcome');
            }
        }
        // return view('pages.welcome');
        // echo Auth::user();
    }
}
