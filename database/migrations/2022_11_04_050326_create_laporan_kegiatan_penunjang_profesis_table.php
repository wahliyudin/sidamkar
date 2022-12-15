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
        Schema::create('laporan_kegiatan_penunjang_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('periode_id')->nullable();
            $table->string('kode');
            $table->foreignUuid('user_id')->nullable();
            $table->unsignedBigInteger('butir_kegiatan_id')->nullable();
            $table->unsignedBigInteger('sub_butir_kegiatan_id')->nullable();
            $table->text('detail_kegiatan');
            $table->dateTime('current_date');
            $table->float('score', places: 4, unsigned: true)->nullable();
            $table->enum('status', [1, 2, 3, 4])->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('periode_id')->on('periodes')->references('id')->nullOnDelete();
            $table->foreign('user_id')->on('users')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kegiatan_penunjang_profesis');
    }
};