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
        Schema::create('penilai_angka_kredits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aparatur_id');
            $table->unsignedBigInteger('penilai_ak_id');
            $table->unsignedBigInteger('kab_kota_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->timestamps();

            $table->foreign('aparatur_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('penilai_ak_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->cascadeOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilai_angka_kredits');
    }
};
