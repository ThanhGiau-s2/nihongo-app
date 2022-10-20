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
        Schema::create('chitietkqkttvs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('luachon');
            $table->integer('ketqua');
            $table->timestamps();
        });
        Schema::table('chitietkqkttvs', function ($table) {
            $table->integer('id_kq')->unsigned();        
            $table->foreign('id_kq')->references('id')->on('kqkttvs');
            $table->integer('id_ch')->unsigned();        
            $table->foreign('id_ch')->references('id')->on('cauhoituvungs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietkqkttvs');
    }
};
