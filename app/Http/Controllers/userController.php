<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::where('username','!=','adminperpus')->get();

        return view('admin.userlist')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.edituser')->with('profile',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            return redirect(route('user.index'))->with('error', 'Data tidak ditemukan!');
        }

        return view('pages.profile')->with('profile', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect('/')->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            return redirect(route('user.index'))->with('error', 'Data tidak ditemukan!');
        }
        $user->visitor()->delete();
        $user->reservation()->delete();
        $user->fine()->delete();
        $user->loan()->delete();

        $user->delete();
        return redirect(route('user.index'))->with('success', 'data telah dihapus');
    }
}
