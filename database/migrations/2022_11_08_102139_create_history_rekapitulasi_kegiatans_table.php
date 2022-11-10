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
        Schema::create('history_rekapitulasi_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('struktural_id');
            $table->unsignedBigInteger('rekapitulasi_kegiatan_id');
            $table->string('content');
            $table->timestamps();

            $table->foreign('struktural_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('rekapitulasi_kegiatan_id')->on('rekapitulasi_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_rekapitulasi_kegiatans');
    }
};