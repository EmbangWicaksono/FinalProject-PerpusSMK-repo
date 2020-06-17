<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'ID anggota');
    }
    public function book_item()
    {
        return $this->belongsTo('App\book_item', 'kode buku', 'kode buku');
    }
}
