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
            $table->string('pangkat_golongan_tmt')->nullable();
            $table->string('nomenklatur_jabatan')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['P', 'L'])->nullable();
            $table->integer('pendidikan_terakhir')->nullable(); // Enum
            $table->string('foto_pegawai')->nullable();
            $table->string('file_sk')->nullable();
            $table->string('file_ttd')->nullable();
            $table->unsignedBigInteger('kab_kota_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->cascadeOnDelete();
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
