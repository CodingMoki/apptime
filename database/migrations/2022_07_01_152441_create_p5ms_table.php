<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateP5msTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p5ms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_lokasi');
            $table->string('nrp');
            $table->string('id_departemen');
            $table->string('hari');
            $table->datetime('tanggal');
            $table->string('id_shift');
            $table->text('materi')->nullable();
            $table->string('photo_p5m');
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p5ms');
    }
}
