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

    public function suggest_book()
    {
        return view('pages.suggestion');
    }

    public function bookstore(Request $request)
    {
        $this->validate($request,[
            'Judul_bk' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required|min:1',
            'harga' => 'required|min:1',
        ]);

        $store = New book_suggestion;
        $store->{'ID anggota'} = $request->input('id');
        $store->nama = $request->input('name');
        $store->{'judul buku'} = $request->input('Judul_bk');
        $store->penulis = $request->input('penulis');
        $store->penerbit = $request->input('penerbit');
        $store->jumlah  = $request->input('jumlah');
        $store->{'perkiraan harga'} = $request->input('harga');
        $store->save();

        return redirect('/')->with('success', 'Data Berhasil Dimasukkan');
    }
}
