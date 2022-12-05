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
        Schema::create('mentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('atasan_langsung_id');
            $table->foreignUuid('fungsional_id');
            $table->timestamps();

            $table->foreign('atasan_langsung_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('fungsional_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentes');
    }
};