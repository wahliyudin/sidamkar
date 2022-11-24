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
        Schema::create('kab_kotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('penilai_ak_id')->nullable();
            $table->unsignedBigInteger('penetap_ak_id')->nullable();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('provinsi_id')->on('provinsis')->references('id')->cascadeOnDelete();
            $table->foreign('penilai_ak_id')->on('users')->references('id')->nullOnDelete();
            $table->foreign('penetap_ak_id')->on('users')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kab_kotas');
    }
};
