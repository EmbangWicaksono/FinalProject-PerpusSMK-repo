<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
class reservation extends Model
{
    protected $primaryKey = ['id anggota','kode buku'];
    public $incrementing = false;
}
