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
        Schema::create('butir_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_unsur_id');
            $table->string('nama');
            $table->string('satuan_hasil')->nullable();
            $table->float('score');
            $table->timestamps();

            $table->foreign('sub_unsur_id')->on('sub_unsurs')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butir_kegiatans');
    }
};
