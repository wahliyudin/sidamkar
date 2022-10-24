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
        Schema::create('rencana_butir_kegiatan_sub_butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_butir_kegiatan_id');
            $table->unsignedBigInteger('sub_butir_kegiatan_id');
            $table->float('score');
            $table->integer('percent');
            $table->timestamps();

            $table->foreign('rencana_butir_kegiatan_id')->on('rencana_butir_kegiatans')->references('id')->cascadeOnDelete();
            $table->foreign('sub_butir_kegiatan_id')->on('sub_butir_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_butir_kegiatan_sub_butir_kegiatans');
    }
};
