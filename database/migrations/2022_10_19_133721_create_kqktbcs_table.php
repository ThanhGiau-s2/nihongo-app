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
        Schema::create('ketquaktbaicuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ketqua');
            $table->string('hoatdong');
            $table->string('giobatdau');
            $table->string('gioketthuc');
            $table->string('giohoanthanh')->nullable();
            $table->boolean('post')->default(0);
            $table->date('ngay');
            $table->timestamps();
        });
        Schema::table('ketquaktbaicuses', function ($table) {
            $table->bigInteger('id_hv')->unsigned()->index();
            $table->foreign('id_hv')->references('id')->on('hocviens')->onDelete('cascade');
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
        Schema::dropIfExists('kqktbcs');
    }
};
