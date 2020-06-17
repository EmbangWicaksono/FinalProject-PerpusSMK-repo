<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('book_authors');
        Schema::create('book_authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('ISBN_Buku',13);
            $table->bigInteger('author_id')->unsigned();
            $table->string('role');
            $table->timestamps();
        });
        Schema::table('book_authors', function (Blueprint $table) {
            $table->foreign('ISBN_Buku')->references('ISBN')->on('books');
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_authors');
    }
}
