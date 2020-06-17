<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    protected $keyType = 'string';

    public function publisher()
    {
        return $this->belongsTo('App\publisher', 'ID Penerbit');
    }
    public function book_item()
    {
        return $this->hasMany('App\book_item', 'ISBN', 'ISBN');
    }
    public function book_entry()
    {
        return $this->hasMany('App\book_entry', 'ISBN', 'ISBN');
    }
}
