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
        Schema::create('dokumen_kegiatan_penunjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_butir_kegiatan_sub_butir_kegiatan_id');
            $table->string('title');
            $table->string('file');
            $table->timestamps();

            // $table->foreign('rencana_butir_kegiatan_sub_butir_kegiatan_id')->on('rencana_butir_kegiatan_sub_butir_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_kegiatan_penunjangs');
    }
};
