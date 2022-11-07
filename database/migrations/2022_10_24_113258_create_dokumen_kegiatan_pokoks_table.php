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
        Schema::create('dokumen_kegiatan_pokoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laporan_kegiatan_jabatan_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('laporan_kegiatan_jabatan_id')->on('laporan_kegiatan_jabatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_kegiatan_pokoks');
    }
};
