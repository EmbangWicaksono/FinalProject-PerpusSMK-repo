<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reservations');
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigInteger('id anggota')->unsigned();
            $table->char('kode buku', 10);
            $table->date('tanggal reservasi');
            $table->string('judul buku');
            $table->timestamps();
        });
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('id anggota')->references('id')->on('users');
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
        Schema::dropIfExists('reservations');
    }
}
