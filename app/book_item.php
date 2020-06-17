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
}
