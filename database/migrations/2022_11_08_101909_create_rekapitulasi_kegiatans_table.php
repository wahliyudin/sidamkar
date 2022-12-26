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
        Schema::create('rekapitulasi_kegiatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fungsional_id');
            $table->unsignedBigInteger('periode_id');
            $table->enum('is_send', [1, 2, 3])->nullable();
            $table->boolean('is_ttd_atasan_langsung')->default(false);
            $table->boolean('is_ttd_penilai')->default(false);
            $table->boolean('is_ttd_penetap')->default(false);
            $table->string('link_pernyataan')->nullable();
            $table->string('name_pernyataan')->nullable();
            $table->string('link_rekap_capaian')->nullable();
            $table->string('name_rekap_capaian')->nullable();
            $table->float('total_capaian', places: 4, unsigned: true)->nullable();
            $table->string('link_pengembang')->nullable();
            $table->string('name_pengembang')->nullable();
            $table->float('jml_ak_profesi', places: 4, unsigned: true)->nullable();
            $table->float('jml_ak_penunjang', places: 4, unsigned: true)->nullable();
            $table->string('link_penilaian_capaian')->nullable();
            $table->string('name_penilaian_capaian')->nullable();
            $table->float('capaian_ak', places: 4, unsigned: true)->nullable();
            $table->string('link_penetapan')->nullable();
            $table->string('name_penetapan')->nullable();
            $table->string('keterangan_1')->nullable();
            $table->string('keterangan_2')->nullable();
            $table->string('keterangan_3')->nullable();
            $table->string('keterangan_4')->nullable();
            $table->string('keterangan_5')->nullable();
            $table->timestamps();

            $table->foreign('fungsional_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('periode_id')->on('periodes')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapitulasi_kegiatans');
    }
};