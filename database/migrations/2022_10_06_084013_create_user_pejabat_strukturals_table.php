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
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->string('nama');
            $table->unsignedBigInteger('pangkat_golongan_tmt_id')->nullable();
            $table->date('golongan_tmt')->nullable();
            $table->date('jabatan_tmt')->nullable();
            $table->unsignedBigInteger('nomenklatur_perangkat_daerah_id')->nullable();
            $table->enum('nomenklatur_jabatan', ['1', '2', '3', '4'])->nullable();
            $table->bigInteger('nip')->nullable();
            $table->bigInteger('nomor_karpeg')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['P', 'L'])->nullable();
            $table->enum('tingkat_aparatur', ['provinsi', 'kab_kota'])->nullable();
            $table->enum('pendidikan_terakhir', ['1', '2', '3'])->nullable(); // Enum
            $table->enum('eselon', ['1', '2', '3', '4'])->nullable(); // Enum
            $table->string('foto_pegawai')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('file_ttd')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('catatan')->nullable();
            $table->foreignUuid('kab_kota_id')->nullable();
            $table->foreignUuid('provinsi_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
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
