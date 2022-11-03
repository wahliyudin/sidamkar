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
        Schema::create('profesi_sub_butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesi_butir_kegiatan_id');
            $table->unsignedBigInteger('sub_butir_kegiatan_id');
            $table->integer('status')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('profesi_butir_kegiatan_id')->on('profesi_butir_kegiatans')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('profesi_sub_butir_kegiatans');
    }
};
