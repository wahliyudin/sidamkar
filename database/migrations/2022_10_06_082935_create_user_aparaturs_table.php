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
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->enum('pangkat_golongan_tmt', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17'])->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('nomor_karpeg')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenjang', ['junior', 'senior'])->nullable();
            $table->enum('jenis_kelamin', ['P', 'L'])->nullable();
            $table->enum('pendidikan_terakhir', ['1', '2', '3'])->nullable(); // Enum
            $table->string('foto_pegawai')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kab_kota_id');
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
        Schema::dropIfExists('user_aparaturs');
    }
};
