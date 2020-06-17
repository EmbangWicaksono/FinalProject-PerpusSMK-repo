<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
class book_author extends Model
{
    protected $primaryKey = ['ISBN_Buku','author_id'];
    public $incrementing = false;

    public function Book()
    {
        return $this->belongsTo('App\Book', 'ISBN_Buku', 'ISBN');
    }

    public function author()
    {
        return $this->belongsTo('App\author');
    }

}
