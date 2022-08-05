<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_departement');
            $table->string('id_inspek');
            $table->string('id_nama');
            $table->string('id_nrp');
            $table->date('tanggal');
            $table->string('hari');
            $table->string('id_lokasi');
            $table->text('form_observasi')->nullable();
            $table->string('foto_deviasi');
            $table->string('tdk_lanjut_deviasi');
            $table->date('duedate_deviasi');
            $table->string('pic_deviasi');
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
        Schema::dropIfExists('inspeksis');
    }
}
