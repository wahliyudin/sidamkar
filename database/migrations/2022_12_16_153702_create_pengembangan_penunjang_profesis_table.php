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
        Schema::create('pengembangan_penunjang_profesis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fungsional_id');
            $table->unsignedBigInteger('periode_id');
            $table->float('jml_ak_profesi', places: 4, unsigned: true)->nullable();
            $table->float('jml_ak_penunjang', places: 4, unsigned: true)->nullable();
            $table->boolean('is_send')->default(false);
            $table->string('name');
            $table->string('link');
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
        Schema::dropIfExists('pengembangan_penunjang_profesis');
    }
};