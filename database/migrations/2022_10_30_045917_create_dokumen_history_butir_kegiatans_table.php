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
        Schema::create('dokumen_history_butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_butir_kegiatan_id');
            $table->string('file');
            $table->timestamps();

            // $table->foreign('history_butir_kegiatan_id')->on('history_butir_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_history_butir_kegiatans');
    }
};
