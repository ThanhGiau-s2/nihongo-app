<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhsachmp3s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mp3docvanmau');
            $table->string('mp3btn1');
            $table->string('mp3tuvung');
            $table->string('mp3btn2');
            $table->timestamps();
        });
        Schema::table('danhsachmp3s', function ($table) {
            $table->bigInteger('id_bai')->unsigned();        
            $table->foreign('id_bai')->references('id')->on('bais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhsachmp3s');
    }
};
