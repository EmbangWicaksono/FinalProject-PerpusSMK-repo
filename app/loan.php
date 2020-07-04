<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class loan extends Pivot
{
    protected $table = 'loans';
    public $incrementing = true;

    public function book_item()
    {
        return $this->belongsTo('App\book_item', 'kode buku', 'kode buku');
    }
}
