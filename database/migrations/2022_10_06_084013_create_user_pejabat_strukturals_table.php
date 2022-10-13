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
            $table->string('pangkat_golongan_tmt');
            $table->string('nomenklatur_jabatan');
            $table->bigInteger('nip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['P', 'L']);
            $table->integer('pendidikan_terakhir'); // Enum
            $table->string('foto_pegawai')->nullable();
            $table->string('file_sk_penilai_ak')->nullable();
            $table->string('file_ttd');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
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
