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
        Schema::create('rekapitulasi_capaians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fungsional_id');
            $table->unsignedBigInteger('periode_id');
            $table->float('total_capaian', places: 4, unsigned: true)->nullable();
            $table->boolean('is_send')->default(false);
            $table->string('name');
            $table->string('link');
            $table->timestamps();

            $table->foreign('fungsional_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('periode_id')->on('periodes')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapitulasi_capaians');
    }
};