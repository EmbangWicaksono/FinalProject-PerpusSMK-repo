<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class reservation extends Pivot
{
    public $incrementing = false;
    protected $table = 'reservations';

    public function user()
    {
        return $this->belongsTo('App\User', 'id anggota');
    }

    public function book_item()
    {
        return $this->belongsTo('App\book_item', 'kode buku', 'kode buku');
    }
}
