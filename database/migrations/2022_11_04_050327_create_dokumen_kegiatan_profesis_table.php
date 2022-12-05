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
        Schema::create('dokumen_kegiatan_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('laporan_kegiatan_profesi_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('laporan_kegiatan_profesi_id')->on('laporan_kegiatan_profesis')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_kegiatan_profesis');
    }
};