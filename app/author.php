<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $fillable = [
        'nama','type'
    ];
    public function book()
    {
        return $this->belongsToMany('App\Book','book_authors','author_id','book_id')
                                    ->withPivot('role')
                                    ->withTimestamps();
    }
}
