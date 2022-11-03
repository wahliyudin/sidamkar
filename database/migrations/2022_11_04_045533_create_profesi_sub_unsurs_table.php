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
        Schema::create('profesi_sub_unsurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesi_unsur_id');
            $table->unsignedBigInteger('sub_unsur_id');
            $table->timestamps();

            $table->foreign('profesi_unsur_id')->on('profesi_unsurs')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('profesi_sub_unsurs');
    }
};
