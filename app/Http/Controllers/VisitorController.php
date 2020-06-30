<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\visitor;
use App\User;

class VisitorController extends Controller
{
    public function index()
    {
        $today = visitor::whereDate('added_on', Carbon::today())->get();
        return view('pages.visitor')->with('today', $today);
    }

    public function check_id(Request $request)
    {
        $check = User::where('username',$request->input('username'))->first();
        
        $today = visitor::whereDate('added_on', Carbon::today())->get();
        foreach ($today as $visit) {
            if ($visit->{'nama pengunjung'} == $check->name) {
                return redirect('/pengunjung')->with('error', 'pengunjung telah input');
            }
        }
        
        if ($check) {
            $this->insert_visitor($check);
            return redirect('/pengunjung');
        } else {
            return redirect('/pengunjung')->with('error', 'nomor induk tidak ditemukan');
        }
    }
    public function insert_visitor($data)
    {
        $visitor = new visitor;

        $visitor->{'ID anggota'} = $data->id;
        $visitor->{'nama pengunjung'} = $data->name;
        $visitor->status = $data->status;
        $visitor->save();
    }
}
