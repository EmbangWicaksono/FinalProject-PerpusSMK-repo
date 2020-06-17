<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fine extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','ID anggota');
    }
}
