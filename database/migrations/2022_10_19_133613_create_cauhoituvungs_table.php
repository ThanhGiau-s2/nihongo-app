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
        Schema::create('cauhoituvungs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noidung')->nullable();
            $table->string('dapan1');   
            $table->string('dapan2'); 
            $table->string('dapan3');   
            $table->string('dapan4');     
            $table->string('dapandung');
            $table->timestamps();
        });
        Schema::table('cauhoituvungs', function ($table) {
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
        Schema::dropIfExists('cauhoituvungs');
    }
};
