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
        Schema::create('history_penunjang_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('laporan_kegiatan_penunjang_profesi_id');
            $table->text('keterangan');
            $table->dateTime('current_date');
            $table->text('detail_kegiatan')->nullable();
            $table->string('catatan')->nullable();
            $table->string('icon');
            $table->integer('status');
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
        Schema::dropIfExists('history_penunjang_profesis');
    }
};