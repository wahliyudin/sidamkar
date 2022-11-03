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
            $table->id();
            $table->string('title')->nullable();
            $table->string('file');
            $table->unsignedBigInteger('profesi_butir_kegiatan_id');
            $table->unsignedBigInteger('profesi_sub_butir_kegiatan_id');
            $table->timestamps();

            $table->foreign('profesi_butir_kegiatan_id')->on('profesi_butir_kegiatans')->references('id')->cascadeOnDelete();
            $table->foreign('profesi_sub_butir_kegiatan_id')->on('profesi_sub_butir_kegiatans')->references('id')->cascadeOnDelete();
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
