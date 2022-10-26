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
        Schema::create('unsurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('jenis_kegiatan_id');
            $table->string('nama')->fulltext();
            $table->timestamps();

            $table->foreign('role_id')->on('roles')->references('id')->nullOnDelete();
            $table->foreign('jenis_kegiatan_id')->on('jenis_kegiatans')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unsurs');
    }
};
