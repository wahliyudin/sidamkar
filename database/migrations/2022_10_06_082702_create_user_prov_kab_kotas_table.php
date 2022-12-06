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
        Schema::create('user_prov_kab_kotas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->unsignedBigInteger('nomenklatur_perangkat_daerah_id');
            $table->string('file_permohonan')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('catatan')->nullable();
            $table->foreignUuid('kab_kota_id')->nullable();
            $table->foreignUuid('provinsi_id')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->nullOnDelete();
            // $table->foreign('nomenklatur_perangkat_daerah_id')->on('nomenklatur_perangkat_daerahs')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_prov_kab_kotas');
    }
};