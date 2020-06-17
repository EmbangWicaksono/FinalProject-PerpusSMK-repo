<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_item extends Model
{
    protected $primaryKey = 'kode buku';
    protected $keyType = 'string';
    public $incrementing = false;
}
