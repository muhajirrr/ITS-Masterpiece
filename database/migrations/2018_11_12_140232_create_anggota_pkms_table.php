<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaPkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_pkms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->char('nrp', 14);
            $table->char('angkatan', 4);
            $table->unsignedInteger('id_pkm');
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
        Schema::dropIfExists('anggota_pkms');
    }
}
