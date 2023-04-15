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
        Schema::create('dangkihocs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngaydangkihoc')->nullable();
            $table->timestamps();
        });
        Schema::table('dangkihocs', function ($table) {
            $table->bigInteger('id_hv')->unsigned();
            $table->foreign('id_hv')->references('id')->on('hocviens');
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
        Schema::dropIfExists('dangkihocs');
    }
};
