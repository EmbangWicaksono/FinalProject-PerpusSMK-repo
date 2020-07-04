<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_items', function (Blueprint $table) {
            $table->char('kode buku',10)->primary();
            $table->char('ISBN',13);
            $table->string('judul buku');
            $table->string('kondisi');
            $table->bigInteger('ID pemasukan')->unsigned();
            $table->char('kode klasifikasi',20);
            $table->timestamps();
        });
        Schema::table('book_items', function (Blueprint $table) {
            $table->foreign('ISBN')->references('ISBN')->on('books');
            $table->foreign('ID pemasukan')->references('id')->on('book_entries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_items');
    }
}
