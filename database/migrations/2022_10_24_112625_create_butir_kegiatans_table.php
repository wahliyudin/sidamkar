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
            $table->unsignedBigInteger('role_id')->nullable()->default(null);
            $table->string('nama')->fulltext();
            $table->string('satuan_hasil')->nullable();
            $table->float('score', places: 3)->nullable();
            $table->integer('percent')->nullable();
            $table->timestamps();

            $table->foreign('sub_unsur_id')->on('sub_unsurs')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('butir_kegiatans');
    }
};