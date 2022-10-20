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
        Schema::create('tuvungs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hiragana');
            $table->string('hantu')->nullable();
            $table->string('nghia');
            $table->string('amthanh')->nullable();
            $table->timestamps();
        });
        Schema::table('tuvungs', function ($table) {
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
        Schema::dropIfExists('tuvungs');
    }
};
