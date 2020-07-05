<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\book_suggestion;
use App\Book;

class UserbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('searchbook','searchpage','detailbuku');
    }

    public function searchpage()
    {
        return view('pages.search_book');
    }
    public function showloan($id)
    {
        $user = $user = User::findOrFail($id);
        $loan = $user->loanitem;

        return view('pages.loan')->with('loan', $loan);
    }

    public function historyloan($id)
    {
        $user = $user = User::findOrFail($id);
        $loan = $user->book_item;
        return view('pages.history')->with('loan', $loan);
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

    public function searchbook(Request $request)
    {
        $books = Book::where('Judul Buku','like','%'.$request->input('search').'%')->get();
        // $books = Book::all();
        return view('pages.search_book')->with('books', $books);
    }

    public function detailbuku($id)
    {
        $book = Book::where('ISBN',$id)->first();
        return view('pages.detailbuku')->with('book',$book);
    }
}
