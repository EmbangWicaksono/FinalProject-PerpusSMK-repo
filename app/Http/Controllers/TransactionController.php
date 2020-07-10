<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\fine;
use App\book_item;
use App\loan;
use App\reservation;
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
    public function transactionhistory()
    {
        return view('admin.history');
    }

    public function transactionreservation()
    {
        return view('admin.reservation');
    }

    public function showmemberissue(Request $request)
    {
        $user = User::where('username',$request->id)->first();
        if (!isset($user)) {
            return redirect()->back()->with('error','nomor induk tidak ditemukan');
        }
        return view('admin.issuepage')->with('user', $user);
    }
    public function showmemberloan(Request $request)
    {
        $user = User::where('username',$request->id)->first();
        
        if (!isset($user)) {
            return redirect()->back()->with('error','nomor induk tidak ditemukan');
        }
        return view('admin.loan')->with('user', $user);
    }
    public function showmemberhistory(Request $request)
    {
        $user = User::where('username',$request->id)->first();
        
        if (!isset($user)) {
            return redirect()->back()->with('error','nomor induk tidak ditemukan');
        }
        return view('admin.history')->with('user', $user);
    }
    public function showmembereservation(Request $request)
    {
        $user = User::where('username',$request->id)->first();
        
        if (!isset($user)) {
            return redirect()->back()->with('error','nomor induk tidak ditemukan');
        }
        return view('admin.reservation')->with('user', $user);
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
        $book_item = book_item::findOrFail($request->input('kode'));
        if ($book_item->borrow == 1) {
            $user = User::findOrFail($request->input('id'));
            $today = Carbon::now()->format('Y-m-d');
            $returnday = Carbon::now()->addDays(3)->format('Y-m-d');
            $book_item->borrow = 0;
            $book_item->save();
            $user->book_item()->attach($book_item, ['nama peminjam' => $user->name,'kode buku' => $book_item->{'kode buku'},'judul buku' => $book_item->{'judul buku'},'tanggal pinjam' => $today, 'batas kembali' => $returnday, 'perpanjang' => 0]);
        } else {
            return redirect()->back()->with('error','buku sedang dipinjam');
        }

        return redirect()->back();
    }

    public function addreservation(Request $request)
    {
        $book_item = book_item::findOrFail($request->input('kode'));
        if (count($book_item->reserve) > 0) {
            return redirect()->back()->with('error','buku telah dipesan!');
        }
        if ($book_item->borrow == 0) {
            $user = User::findOrFail($request->input('id'));
            $today = Carbon::now()->format('Y-m-d');
            $user->save();
            $book_item->save();
            $user->reservation()->attach($book_item,['tanggal reservasi' => $today, 'judul buku' => $book_item->{'judul buku'},'kode buku' => $book_item->{'kode buku'}]);
        } else {
            return redirect()->back()->with('success','buku dapat dipinjam');
        }
        return redirect()->back();
    }

    public function deletereservation(Request $request)
    {
        $reserve = reservation::where('kode buku',$request->input('kode'))->where('id anggota',$request->input('id'));
        $book_item = book_item::findOrFail($request->input('kode'));
        if ($book_item->borrow == 1) {
            $user = User::findOrFail($request->input('id'));
            $today = Carbon::now()->format('Y-m-d');
            $returnday = Carbon::now()->addDays(3)->format('Y-m-d');
            $book_item->borrow = 0;
            $book_item->save();
            $user->book_item()->attach($book_item, ['nama peminjam' => $user->name,'kode buku' => $book_item->{'kode buku'},'judul buku' => $book_item->{'judul buku'},'tanggal pinjam' => $today, 'batas kembali' => $returnday, 'perpanjang' => 0]);
            $reserve->delete();
        } else {
            return redirect()->back()->with('error','buku sedang dipinjam');
        }

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

    public function perpanjang(Request $request)
    {
        $loan = loan::findOrFail($request->input('id'));
        $date = Carbon::createFromFormat('Y-m-d',$loan->{'batas kembali'});
        $date = $date->addDays(3)->format('Y-m-d');
        $loan->{'batas kembali'} = $date;
        $loan->perpanjang = 1;
        $loan->save();
        return redirect()->back();

    }

    public function returnbook(Request $request)
    {
        $loan = loan::findOrFail($request->input('id'));
        $date = Carbon::now()->format('Y-m-d');
        $loan->{'tanggal kembali'} = $date;
        $loan->book_item->borrow = 1;
        $loan->book_item->save();
        $loan->save();
        return redirect()->back();
    }
}
