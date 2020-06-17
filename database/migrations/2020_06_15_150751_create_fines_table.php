<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ID anggota')->unsigned();
            $table->integer('total denda');
            $table->string('jenis denda');
            $table->string('status denda');
            $table->timestamps();
        });
        Schema::table('fines', function (Blueprint $table) {
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
        Schema::dropIfExists('fines');
    }
}
