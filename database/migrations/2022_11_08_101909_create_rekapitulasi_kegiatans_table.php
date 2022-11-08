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
        Schema::create('rekapitulasi_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fungsional_id');
            $table->string('file');
            $table->string('file_name');
            $table->timestamps();

            $table->foreign('fungsional_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapitulasi_kegiatans');
    }
};
