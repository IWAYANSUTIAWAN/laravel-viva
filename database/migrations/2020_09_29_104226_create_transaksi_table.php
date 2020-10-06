<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->string('lokasi_id');
            $table->string('user_id')->nullable();
            $table->string('nama_aset');
            $table->string('cpu_id')->nullable();
            $table->string('monitor_id')->nullable();
            $table->string('keyboard_id')->nullable();
            $table->string('mouse_id')->nullable();
            $table->string('printer_id')->nullable();
            $table->string('scaner_id')->nullable();
            $table->string('finger_id')->nullable();
            $table->string('dvr_id')->nullable();
            $table->string('cctv_id')->nullable();
            $table->string('webcame_id')->nullable();
            $table->string('modem_id')->nullable();
            $table->string('isp_id')->nullable();
            $table->string('ups_id')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
