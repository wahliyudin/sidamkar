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
        Schema::create('provinsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilai_ak_id')->nullable();
            $table->unsignedBigInteger('penetap_ak_id')->nullable();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('penilai_ak_id')->on('users')->references('id')->nullOnDelete();
            $table->foreign('penetap_ak_id')->on('users')->references('id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinsis');
    }
};
