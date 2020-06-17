<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    public function book()
    {
        return $this->hasMany('App\Book', 'ID Penerbit');
    }
}
