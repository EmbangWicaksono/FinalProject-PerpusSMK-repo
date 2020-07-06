<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\visitor;
use App\loan;
use App\reservation;
use Illuminate\Support\Collection;
use Carbon\Carbon;

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
                $visitor = visitor::whereDate('added_on', Carbon::today())->count(); 
                $loan = loan::whereDate('tanggal pinjam', Carbon::today())->count();
                $reservation = reservation::all()->count();
                $today = collect([
                    'visitor' => $visitor,
                    'loan' => $loan,
                    'reservation' => $reservation
                ]);
                return view('admin.index')->with('today',$today);
                // return $today;
            } else {
                return view('pages.welcome');
            }
        }
        // return view('pages.welcome');
        // echo Auth::user();
    }
}
