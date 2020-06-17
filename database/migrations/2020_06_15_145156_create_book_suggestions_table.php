<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_suggestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ID anggota')->unsigned();
            $table->string('nama');
            $table->string('judul buku');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('jumlah');
            $table->integer('perkiraan harga');
            $table->timestamps();
        });
        Schema::table('book_suggestions', function (Blueprint $table) {
            $table->foreign('ID anggota')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_suggestions');
    }
}
