<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    public $timestamps = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->added_on = $model->freshTimestamp();
        });
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'ID anggota');
    }
}
