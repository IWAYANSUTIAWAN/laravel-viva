<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitor', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_id');
            $table->string('region');
            $table->string('merek');
            $table->string('model');
            $table->string('sn');
            $table->string('ukuran');
            $table->string('kondisi');
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
        Schema::dropIfExists('monitor');
    }
}
