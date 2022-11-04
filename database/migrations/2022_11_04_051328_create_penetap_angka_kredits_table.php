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
        Schema::create('penetap_angka_kredits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aparatur_id');
            $table->unsignedBigInteger('penetap_ak_id');
            $table->unsignedBigInteger('kab_kota_id');
            $table->timestamps();

            $table->foreign('aparatur_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('penetap_ak_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penetap_angka_kredits');
    }
};
