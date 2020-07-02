<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\publisher;
use App\author;
use App\Book;
use App\book_entry;
use App\book_item;

class AdminbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    public function addbiblio()
    {
        $publisher = publisher::all();
        return view('admin.biblio')->with('publishers',$publisher);
    }

    public function additem()
    {
        return view('admin.copybook');
    }

    public function bibliolist()
    {
        $books = Book::orderBy('Judul Buku', 'asc')->paginate(10);

        return view('admin.bibliolist')->with('books', $books);
    }

    public function itemlist()
    {
        $books = book_item::orderBy('kode buku', 'asc')->paginate(10);

        return view('admin.copylist')->with('books', $books);
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

        return redirect('/addbiblio')->with('success', 'Data Berhasil Dimasukkan');
    }

    public function insertcopy(Request $request)
    {
        $this->validate($request,[
            'ISBN' => 'required',
            'judul_buku' => 'required|string',
            'kode' => 'required|unique:book_items,kode buku',
            'kode_k' => 'required|unique:book_items,kode klasifikasi',
            'sumber' => 'required',
            'harga' => 'nullable',
            'Tanggal_Masuk' => 'required'
        ]);
        
        $book_entry = new book_entry;
        $book_entry->ISBN = $request->input('ISBN');
        $book_entry->{'tanggal masuk'} = $request->input('Tanggal_Masuk');
        $book_entry->Sumber = $request->input('sumber');
        $book_entry->harga = $request->input('harga');
        $book_entry->save();

        $book_item = new book_item;
        $book_item->ISBN = $request->input('ISBN');
        $book_item->{'judul buku'} = $request->input('judul_buku');
        $book_item->{'kode buku'} = $request->input('kode');
        $book_item->kondisi = $request->input('kondisi');
        $book_item->{'kode klasifikasi'} = $request->input('kode_k');
        $book_entry->book_item()->save($book_item);

        return redirect('/addcopy')->with('success', 'data telah berhasil dimasukkan')->withInput();
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        if($search == ''){
           $books = Book::orderby('Judul Buku','asc')->select('ISBN','Judul Buku')->limit(5)->get();
        }else{
           $books = Book::orderby('Judul Buku','asc')->select('ISBN','Judul Buku')->where('Judul Buku', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($books as $book){
           $response[] = array("value"=>$book->ISBN,"label"=>$book->{'Judul Buku'});
        }
  
        return response()->json($response);
            
    }
    
    public function showcopy($id)
    {
        $book_item = book_item::where('kode buku', $id)->firstOrFail();
        return view('admin.showcopy')->with('book_item', $book_item);
    }
    public function showbiblio($id)
    {
        $book = Book::where('ISBN',$id)->firstOrFail();
        echo $book;
        // return view('admin.showbiblio')->with('book', $book);
    }

    public function editcopy(Request $request, $id)
    {
        $book_entry = book_entry::findOrFail($id);
        $this->validate($request,[
            'ISBN' => 'required',
            'judul_buku' => 'required|string',
            'kode' => 'required',
            'kode_k' => 'required',
            'sumber' => 'required',
            'harga' => 'nullable',
            'Tanggal_Masuk' => 'required'
        ]);

        $book_entry->ISBN = $request->input('ISBN');
        $book_entry->Sumber = $request->input('sumber');
        $book_entry->harga = $request->input('harga');
        $book_entry->{'tanggal masuk'} = $request->input('Tanggal_Masuk');
        $book_entry->book_item->{'judul buku'} = $request->input('judul_buku');
        $book_entry->book_item->{'kode buku'} = $request->input('kode');
        $book_entry->book_item->{'kode klasifikasi'} = $request->input('kode_k');
        $book_entry->book_item->kondisi = $request->input('kondisi');
        $book_entry->push();

        return redirect('/listitem')->with('success', 'data berhasil data berhasil diperbaharui!');

    }
    public function editbiblio(Request $request, $id)
    {
        # code...
    }

    public function deletecopy($id)
    {
        $book_entry = book_entry::findOrFail($id);

        $book_entry->delete();

        return redirect('/listitem')->with('success', 'data berhasil dihapus!');
    }

    public function deletebiblio($id)
    {
        $book = Book::where('ISBN',$id)->firstOrFail();
        foreach ($book->author as $author) {
            $book->author()->detach($author->id);
        }
        $book->delete();
        return redirect('/listbiblio')->with('success', 'data berhasil dihapus!');
    }
}
