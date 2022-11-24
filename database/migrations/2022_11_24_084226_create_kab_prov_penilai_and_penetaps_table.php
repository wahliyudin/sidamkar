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
        Schema::create('kab_prov_penilai_and_penetaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilai_ak_id');
            $table->unsignedBigInteger('penetap_ak_id');
            $table->enum('tingkat', ['kab_kota', 'provinsi']);
            $table->boolean('is_cross')->default(false);
            $table->unsignedBigInteger('kab_kota_id')->nullable();
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->timestamps();

            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->nullOnDelete();
            $table->foreign('penilai_ak_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('penetap_ak_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kab_prov_penilai_and_penetaps');
    }
};