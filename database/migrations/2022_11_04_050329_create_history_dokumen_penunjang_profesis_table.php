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
        Schema::create('history_dokumen_penunjang_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('history_penunjang_profesi_id');
            $table->string('name');
            $table->string('link');
            $table->integer('size');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_dokumen_penunjang_profesis');
    }
};