<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'ID anggota');
    }
}
