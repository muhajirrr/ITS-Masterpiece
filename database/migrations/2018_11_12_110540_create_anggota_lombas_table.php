<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->char('nrp', 14);
            $table->char('angkatan', 4);
            $table->unsignedInteger('id_lomba');
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
        Schema::dropIfExists('anggota_lombas');
    }
}
