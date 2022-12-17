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
            $table->boolean('is_send')->default(false);
            $table->boolean('is_ttd')->default(false);
            $table->string('link_pernyataan')->nullable();
            $table->string('name_pernyataan')->nullable();
            $table->string('link_rekap_capaian')->nullable();
            $table->string('name_rekap_capaian')->nullable();
            $table->string('link_pengembang')->nullable();
            $table->string('name_pengembang')->nullable();
            $table->string('link_penilaian_capaian')->nullable();
            $table->string('name_penilaian_capaian')->nullable();
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