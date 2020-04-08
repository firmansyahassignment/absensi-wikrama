<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporkanKesalahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporkan_kesalahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jenis_kesalahan_id')->unsigned();
            $table->string('device_digunakan');
            $table->text('deskripsi');
            $table->text('tangkapan_layar')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('jenis_kesalahan_id')->references('id')->on('jenis_kesalahans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporkan_kesalahans');
    }
}
