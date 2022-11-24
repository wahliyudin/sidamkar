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
        Schema::create('cross_penilai_and_penetaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kab_kota_id')->nullable()->unique();
            $table->unsignedBigInteger('provinsi_id')->nullable()->unique();
            $table->unsignedBigInteger('kab_prov_penilai_and_penetap_id');
            $table->timestamps();

            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->nullOnDelete();
            // $table->foreign('kab_prov_penilai_penetap_id')->on('kab_prov_penilai_penetaps')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cross_penilai_and_penetaps');
    }
};