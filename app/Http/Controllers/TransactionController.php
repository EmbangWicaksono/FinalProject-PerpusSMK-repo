<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\fine;
use App\book_item;
use App\loan;
use Carbon\Carbon;
class TransactionController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin');
    }

    public function transactionissue()
    {
        return view('admin.issuepage');
    }
    public function transactionloan()
    {
        return view('admin.loan');
    }

    public function showmemberissue(Request $request)
    {
        $user = User::where('username',$request->id)->firstOrFail();
        return view('admin.issuepage')->with('user', $user);
    }
    public function showmemberloan(Request $request)
    {
        $user = User::where('username',$request->id)->firstOrFail();
        return view('admin.loan')->with('user', $user);
    }

    public function addfine(Request $request)
    {
        $user = User::findOrFail($request->id);
        $fine = new fine;
        $fine->{'jenis denda'} = $request->input('jenis');
        $fine->{'total denda'} = $request->input('total');
        $user->save();
        $user->fine()->save($fine);

        return redirect()->back();
    }

    public function addloan(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $book_item = book_item::findOrFail($request->input('kode'));
        $today = Carbon::now()->format('Y-m-d');
        $returnday = Carbon::now()->addDays(3)->format('Y-m-d');
        $user->book_item()->attach($book_item, ['nama peminjam' => $user->name,'kode buku' => $book_item->{'kode buku'},'judul buku' => $book_item->{'judul buku'},'tanggal pinjam' => $today, 'batas kembali' => $returnday, 'perpanjang' => 0]);

        return redirect()->back();
    }

    public function deletefine($id)
    {
        $fine = fine::findOrFail($id);
        $user_id = $fine->user->id;
        $user = User::findOrFail($user_id);
        $fine->delete();
        return redirect()->back();
    }

    public function perpanjang($id)
    {
        $loan = loan::findOrFail($id);
        $date = Carbon::createFromFormat('Y-m-d',$loan->{'batas kembali'});
        $date = $date->addDays(3)->format('Y-m-d');
        $loan->{'batas kembali'} = $date;
        $loan->perpanjang = 1;
        $loan->save();
        return redirect()->back();

    }
}
