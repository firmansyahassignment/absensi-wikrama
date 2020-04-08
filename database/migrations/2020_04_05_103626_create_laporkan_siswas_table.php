<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporkanSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporkan_siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('tanggal_absen');
            $table->bigInteger('rayon_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporkan_siswas');
    }
}
