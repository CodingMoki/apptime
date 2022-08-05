<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pegawai');
            $table->string('nrp_pegawai');
            $table->enum('jenis_kelamin', ['pria','wanita']);
            $table->foreignId('id_jabatan_pegawai')->references('id')->on('jabatans')->onDelete('cascade');
            $table->foreignId('id_departemen')->references('id')->on('departemens')->onDelete('cascade');
            $table->foreignId('id_lokasi')->references('id')->on('lokasi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
