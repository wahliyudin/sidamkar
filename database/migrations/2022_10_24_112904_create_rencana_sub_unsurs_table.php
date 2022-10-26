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
        Schema::create('rencana_sub_unsurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_id');
            $table->unsignedBigInteger('sub_unsur_id');
            $table->timestamps();

            $table->foreign('rencana_id')->on('rencanas')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('rencana_sub_unsurs');
    }
};
