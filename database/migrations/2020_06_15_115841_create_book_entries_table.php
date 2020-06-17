<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('ISBN', 13);
            $table->date('tanggal masuk');
            $table->string('judul buku');
            $table->integer('harga');
            $table->timestamps();
        });
        Schema::table('book_entries', function (Blueprint $table) {
            $table->foreign('ISBN')->references('ISBN')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_entries');
    }
}
