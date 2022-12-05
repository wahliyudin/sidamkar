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
            $table->uuid('id')->primary();
            $table->foreignUuid('provinsi_id');
            $table->string('nama');
            $table->timestamps();

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
        Schema::dropIfExists('kab_kotas');
    }
};