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
        Schema::create('sub_butir_kegiatan_profesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('butir_kegiatan_profesi_id');
            $table->unsignedBigInteger('role_id')->nullable()->default(null);
            $table->string('nama')->fulltext();
            $table->string('satuan_hasil')->nullable();
            $table->float('score', places: 3)->nullable();
            $table->integer('percent')->nullable();
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
        Schema::dropIfExists('sub_butir_kegiatan_profesis');
    }
};
