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
        Schema::create('luyennghes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hinh');
            $table->string('cau');
            $table->string('mp3');
            $table->timestamps();
        });
        Schema::table('luyennghes', function ($table) {
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
        Schema::dropIfExists('luyennghes');
    }
};
