<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telpon', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_id');
            $table->string('merek');
            $table->string('tipe');
            $table->string('sn');
            $table->string('region');
            $table->string('kondisi');
            $table->string('pengguna');
            $table->string('mac');
            $table->string('ip');
            $table->string('ext');
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
        Schema::dropIfExists('telpon');
    }
}
