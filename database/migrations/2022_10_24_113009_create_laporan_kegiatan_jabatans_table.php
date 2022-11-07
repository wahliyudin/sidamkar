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
        Schema::create('laporan_kegiatan_jabatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_butir_kegiatan_id');
            $table->text('detail_kegiatan');
            $table->date('current_date');
            $table->float('score', unsigned: true)->nullable();
            $table->integer('status')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('rencana_butir_kegiatan_id')->on('rencana_butir_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kegiatan_jabatans');
    }
};
