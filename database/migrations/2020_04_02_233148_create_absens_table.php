<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('siswa_id')->unsigned();
            $table->bigInteger('rombel_id')->unsigned();
            $table->bigInteger('rayon_id')->unsigned();
            $table->string('keterangan')->nullable();
            $table->date('tanggal_absen');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('cascade');
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
        Schema::dropIfExists('absens');
    }
}
