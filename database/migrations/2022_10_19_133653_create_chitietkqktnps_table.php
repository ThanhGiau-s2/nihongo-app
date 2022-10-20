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
        Schema::create('chitietkqktnps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('luachon');
            $table->integer('ketqua');
            $table->timestamps();
        });
        Schema::table('chitietkqktnps', function ($table) {
            $table->integer('id_kq')->unsigned();        
            $table->foreign('id_kq')->references('id')->on('kqktnps');
            $table->integer('id_ch')->unsigned();        
            $table->foreign('id_ch')->references('id')->on('cauhoinguphaps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietkqktnps');
    }
};
