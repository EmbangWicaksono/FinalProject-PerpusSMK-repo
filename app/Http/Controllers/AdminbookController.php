<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publisher;
use App\author;

class AdminbookController extends Controller
{
    public function addbiblio()
    {
        $publisher = publisher::all();
        return view('admin.biblio')->with('publishers',$publisher);
    }

    public function getAuthor(Request $request)
    {
        # code...
    }
}
