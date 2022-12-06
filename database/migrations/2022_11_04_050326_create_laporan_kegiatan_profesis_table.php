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
        Schema::create('laporan_kegiatan_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->unsignedBigInteger('butir_kegiatan_id')->nullable();
            $table->unsignedBigInteger('sub_butir_kegiatan_id')->nullable();
            $table->text('detail_kegiatan');
            $table->date('current_date');
            $table->float('score')->nullable();
            $table->integer('status')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('butir_kegiatan_id')->on('butir_kegiatans')->references('id')->nullOnDelete();
            $table->foreign('sub_butir_kegiatan_id')->on('sub_butir_kegiatans')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kegiatan_profesis');
    }
};