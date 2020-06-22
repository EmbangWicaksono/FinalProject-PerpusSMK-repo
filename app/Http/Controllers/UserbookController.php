<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\book_suggestion;

class UserbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showloan($id)
    {
        $user = User::find($id)->loan()->where('tanggal kembali', '');

        return view('pages.loan')->with('loan', $user);
    }

    public function historyloan($id)
    {
        $user = User::find($id)->loan();
        return view('pages.loan')->with('loan', $user);
    }
}
