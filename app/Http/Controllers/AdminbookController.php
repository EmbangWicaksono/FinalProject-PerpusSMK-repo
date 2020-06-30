<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\publisher;
use App\author;
use App\Book;

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

    public function insertbiblio(Request $request)
    {
        $Book = new Book;
        $Book->ISBN = $request->input('ISBN');
        $Book->{'Judul Buku'} = $request->input('Judul');
        $Book->{'Tahun Terbit'} = $request->input('Tahun_Terbit');
        $Book->{'Jenis Buku'} = $request->input('Jenis_Buku');
        $Book->Klasifikasi  = $request->input('Klasifikasi');
        $Book->Bahasa  = $request->input('Bahasa');
        $Book->{'ID Penerbit'} = $request->input('Penerbit');
        $Book->save();
        
        for ($i=0; $i < count($request->input('Penulis')); $i++) { 
        $author_id = author::firstOrCreate(['nama' => $request->input('Penulis.'.$i)],['type' => 'Nama Pribadi']);
        $Book->author()->attach($author_id,['role' => $request->input('role.'.$i)]);
        }
    }
}
