<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_poli');
            $table->string('nip');
            $table->string('nama_pasien');
            $table->string('jk');
            $table->string('nohp');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('status_perkawinan');
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
        Schema::dropIfExists('pasien');
    }
};
