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
            $table->id();
            $table->foreignId('user_id');
            $table->string('nomenklatur_perangkat_daerah');
            $table->string('file_permohonan')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('catatan')->nullable();
            $table->unsignedBigInteger('kab_kota_id')->nullable();
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('kab_kota_id')->on('kab_kotas')->references('id')->nullOnDelete();
            $table->foreign('provinsi_id')->on('provinsis')->references('id')->nullOnDelete();
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
