<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_entry extends Model
{
    public function book_item()
    {
        return $this->hasOne('App\book_item', 'ID Pemasukan');
    }

    public function Book()
    {
        return $this->belongsTo('App\Book', 'ISBN', 'ISBN');
    }
}
