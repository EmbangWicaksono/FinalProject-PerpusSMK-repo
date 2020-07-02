<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\fine;
class TransactionController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin');
    }

    public function transactionissue()
    {
        return view('admin.issuepage');
    }

    public function showmemberissue(Request $request)
    {
        $user = User::where('username',$request->id)->firstOrFail();
        return view('admin.issuepage')->with('user', $user);
    }

    public function addfine(Request $request)
    {
        $user = User::findOrFail($request->id);
        $fine = new fine;
        $fine->{'jenis denda'} = $request->input('jenis');
        $fine->{'total denda'} = $request->input('total');
        $user->save();
        $user->fine()->save($fine);

        return redirect()->back()->withInput();
    }
    public function deletefine($id)
    {
        $fine = fine::findOrFail($id);
        $user_id = $fine->user->id;
        $user = User::findOrFail($user_id);
        $fine->delete();
        return redirect()->back()->withInput();
    }
}
