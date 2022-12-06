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
        Schema::create('ketentuan_skp_fungsional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ketentuan_skp_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('nilai_skp')->nullable();
            $table->string('status')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('ketentuan_skp_fungsional');
    }
};
