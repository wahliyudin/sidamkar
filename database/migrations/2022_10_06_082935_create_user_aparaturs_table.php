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
        Schema::create('user_aparaturs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->string('nama');
            $table->unsignedBigInteger('pangkat_golongan_tmt_id')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('nomor_karpeg')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenjang', ['junior', 'senior'])->nullable();
            $table->enum('jenis_kelamin', ['P', 'L'])->nullable();
            $table->enum('tingkat_aparatur', ['provinsi', 'kab_kota'])->nullable();
            $table->enum('pendidikan_terakhir', ['1', '2', '3', '4'])->nullable(); // Enum
            $table->string('foto_pegawai')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignUuid('provinsi_id');
            $table->foreignUuid('kab_kota_id')->nullable();
            $table->unsignedBigInteger('mekanisme_pengangkatan_id')->nullable();
            $table->float('angka_mekanisme', places: 4, unsigned: true)->nullable();
            $table->enum('status_mekanisme', [1, 2, 3, 4])->nullable(); // Menunggu, revisi, terverifikasi, tolak
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
            $table->foreign('pangkat_golongan_tmt_id')->on('pangkat_golongan_tmts')->references('id')->nullOnDelete();
            $table->foreign('mekanisme_pengangkatan_id')->on('mekanisme_pengangkatans')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_aparaturs');
    }
};