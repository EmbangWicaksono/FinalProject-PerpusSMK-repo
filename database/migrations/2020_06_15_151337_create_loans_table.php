<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ID anggota')->unsigned();
            $table->char('kode buku',10);
            $table->string('nama peminjam');
            $table->string('judul buku');
            $table->date('tanggal pinjam');
            $table->date('batas kembali');
            $table->date('tanggal kembali');
            $table->tinyInteger('perpanjang');
            $table->timestamps();
        });
        Schema::table('loans', function (Blueprint $table) {
            $table->foreign('ID anggota')->references('id')->on('users');
            $table->foreign('kode buku')->references('kode buku')->on('book_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
