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
        Schema::create('sub_butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('butir_kegiatan_id');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('nama')->fulltext();
            $table->string('satuan_hasil')->nullable();
            $table->float('score')->nullable();
            $table->integer('percent')->nullable();
            $table->timestamps();

            $table->foreign('butir_kegiatan_id')->on('butir_kegiatans')->references('id')->cascadeOnDelete();
            $table->foreign('role_id')->on('roles')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_butir_kegiatans');
    }
};
