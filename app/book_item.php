<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_item extends Model
{
    protected $primaryKey = 'kode buku';
    protected $keyType = 'string';
    public $incrementing = false;
    public function book_entry()
    {
        return $this->belongsTo('App\book_entry', 'ID pemasukan');
    }
    public function Book()
    {
        return $this->belongsTo('App\Book', 'ISBN', 'ISBN');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'loans', 'kode buku', 'ID anggota')
                                    ->using('App\loan')
                                    ->withPivot('nama peminjam','judul buku','tanggal pinjam','batas kembali','tanggal kembali','perpanjang','id')
                                    ->withTimestamps();
    }
    public function reserve()
    {
        return $this->belongsToMany('App\User', 'reservations', 'kode buku', 'id anggota')
                                    ->using('App\reservation')
                                    ->withPivot('tanggal reservasi','judul buku')
                                    ->withTimestamps();
    }


}
