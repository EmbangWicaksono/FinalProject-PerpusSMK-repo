<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    protected $keyType = 'string';
}
