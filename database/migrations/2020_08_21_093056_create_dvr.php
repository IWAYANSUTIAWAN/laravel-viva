<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvr', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('tipe');
            $table->string('sn');
            $table->string('kondisi');
            $table->string('lokasi_id');
            $table->string('region');
            $table->string('ukuran_hd');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('dvr');
    }
}
