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
        Schema::create('rencana_butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_id');
            $table->unsignedBigInteger('butir_kegiatan_id');
            $table->float('score');
            $table->timestamps();

            $table->foreign('rencana_id')->on('rencanas')->references('id')->cascadeOnDelete();
            $table->foreign('butir_kegiatan_id')->on('butir_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_butir_kegiatans');
    }
};
