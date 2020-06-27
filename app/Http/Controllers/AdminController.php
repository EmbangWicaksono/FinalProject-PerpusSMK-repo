<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.index');
    }

    public function edituser()
    {
        return view('admin.edituser');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->status = $request->input('status');
        $user->{'jenis kelamin'} = $request->input('jenis_kelamin');
        $user->telepon = $request->input('telepon');
        if ($request->has('newpass') && !empty($request->input('newpass'))) {
            $user->password = Hash::make($request->input('newpass'));
        }
        $user->save();
        $profile = $user;
        $success = 'Data Profil telah diubah';
        return redirect(route('user.index'))->with('success', $success);
    }

}
