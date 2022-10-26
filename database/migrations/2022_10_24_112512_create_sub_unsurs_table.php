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
        Schema::create('sub_unsurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unsur_id');
            $table->string('nama')->fulltext();
            $table->timestamps();

            $table->foreign('unsur_id')->on('unsurs')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_unsurs');
    }
};
