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
        Schema::create('history_penetapans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_penetap');
            $table->foreignUuid('periode_id');
            $table->foreignUuid('fungsional_id');
            $table->timestamp('tgl_ttd');
            $table->timestamps();

            // $table->foreign('penetap_id')->on('users')->references('id')->cascadeOnDelete();
            // $table->foreign('periode_id')->on('periodes')->references('id')->cascadeOnDelete();
            // $table->foreign('fungsional_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_penetapans');
    }
};