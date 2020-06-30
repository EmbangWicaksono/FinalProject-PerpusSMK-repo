<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    public function book()
    {
        return $this->belongsToMany('App\Book')
                                    ->using('App\book_author')
                                    ->withPivot([
                                        'role',
                                    ])->withTimestamps();
    }
}
