<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->char('ISBN',13)->primary();
            $table->string('Judul Buku', 100);
            $table->year('Tahun Terbit');
            $table->string('Jenis Buku', 30);
            $table->string('Klasifikasi', 20);
            $table->string('Bahasa', 20);
            $table->timestamps();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->BigInteger('ID Penerbit')->unsigned();
            $table->foreign('ID Penerbit')->references('id')->on('publishers');
            // $table->foreignId('ID_Penerbit')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
