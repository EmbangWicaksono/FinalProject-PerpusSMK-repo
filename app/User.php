<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'jenis kelamin', 'kelas', 'telepon', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function visitor()
    {
        return $this->hasMany('App\visitor', 'ID anggota');
    }
    public function book_suggestion()
    {
        return $this->hasMany('App\book_suggestion', 'ID anggota');
    }
    public function fine()
    {
        return $this->hasMany('App\fine', 'ID anggota');
    }
    public function book_item()
    {
        return $this->belongsToMany('App\book_item', 'loans', 'ID anggota', 'kode buku')
                                    ->using('App\loan')
                                    ->withPivot('nama peminjam','judul buku','tanggal pinjam','batas kembali','tanggal kembali','perpanjang','id')
                                    ->withTimestamps();
    }

    public function loanitem()
    {
        return $this->belongsToMany('App\book_item', 'loans', 'ID anggota', 'kode buku')->wherePivot('tanggal kembali', NULL)
                                    ->using('App\loan')
                                    ->withPivot('nama peminjam','judul buku','tanggal pinjam','batas kembali','tanggal kembali','perpanjang','id')
                                    ->withTimestamps();
    }

    public function reservation()
    {
        return $this->belongsToMany('App\book_item', 'reservations', 'id anggota', 'kode buku')
                                    ->using('App\reservation')
                                    ->withPivot('tanggal reservasi','judul buku')
                                    ->withTimestamps();
    }
}
