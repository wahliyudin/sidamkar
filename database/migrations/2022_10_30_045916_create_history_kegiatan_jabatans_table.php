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
        Schema::create('history_kegiatan_jabatans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('laporan_kegiatan_jabatan_id');
            $table->text('keterangan');
            $table->dateTime('current_date');
            $table->text('detail_kegiatan')->nullable();
            $table->string('catatan')->nullable();
            $table->string('icon');
            $table->integer('status');
            $table->timestamps();

            // $table->foreign('laporan_kegiatan_jabatan_id')->on('laporan_kegiatan_jabatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_kegiatan_jabatans');
    }
};