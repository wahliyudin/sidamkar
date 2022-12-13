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
        Schema::create('sub_unsur_profesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unsur_profesi_id');
            $table->string('nama')->fulltext();
            $table->timestamps();

            $table->foreign('unsur_profesi_id')->on('unsur_profesis')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_unsur_profesis');
    }
};
