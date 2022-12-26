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
        Schema::create('penetapan_angka_kredits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('periode_id');
            $table->foreignUuid('user_id');
            $table->float('ak_kelebihan', places: 4, unsigned: true);
            $table->float('ak_pengalaman', places: 4, unsigned: true);
            $table->float('total_ak_kumulatif', places: 4, unsigned: true)->nullable();
            $table->float('ak_lama_jabatan', places: 4, unsigned: true)->nullable();
            $table->timestamps();

            $table->foreign('periode_id')->on('periodes')->references('id')->cascadeOnDelete();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penetapan_angka_kredits');
    }
};