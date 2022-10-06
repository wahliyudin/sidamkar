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
        Schema::create('user_pejabat_strukturals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->integer('pangkat_golongan_tmt');
            $table->string('nomenklatur_jabatan');
            $table->bigInteger('nip');
            $table->string('foto_pegawai');
            $table->string('file_sk_penilai_ak');
            $table->string('file_ttd');
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
        Schema::dropIfExists('user_pejabat_strukturals');
    }
};
