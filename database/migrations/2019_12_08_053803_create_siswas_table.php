<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nis', 8);
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->bigInteger('rombel_id')->unsigned();
            $table->bigInteger('rayon_id')->unsigned();
            $table->bigInteger('orangtua_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('rombel_id')->references('id')->on('rombels')->onDelete('cascade');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('cascade');
            $table->foreign('orangtua_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
