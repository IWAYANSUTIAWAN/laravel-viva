<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart', function (Blueprint $table) {
            $table->id();
            $table->string('no_tx');
            $table->string('lokasi_id');
            $table->string('nama_aset');
            $table->string('merek');
            $table->string('tipe')->nullable();
            $table->string('sn');
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
        Schema::dropIfExists('chart');
    }
}
