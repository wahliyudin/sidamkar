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
        Schema::create('penetapan_kenaikan_pangkat_jenjangs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fungsional_id');
            $table->foreignUuid('periode_id');
            $table->boolean('is_naik')->default(false);
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
        Schema::dropIfExists('penetapan_kenaikan_pangkat_jenjangs');
    }
};