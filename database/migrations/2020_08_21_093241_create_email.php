<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_id');
            $table->string('region');
            $table->string('gmail');
            $table->string('pwd_gmail')->nullable();
            $table->string('zimbra');
            $table->string('pwd_zimbra')->nullable();
            $table->string('dropbox');
            $table->string('pwd_dropbox')->nullable();
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
        Schema::dropIfExists('email');
    }
}
