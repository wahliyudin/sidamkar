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
        Schema::create('ketentuan_nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('pangkat_golongan_tmt_id');
            $table->float('ak_min', places: 2);
            $table->float('ak_max', places: 2);
            $table->float('ak_kp', places: 2)->nullable();
            $table->float('akk_kj', places: 2)->nullable();
            $table->float('ak_pemeliharaan', places: 2);
            $table->float('ak_bangprof', places: 2)->nullable();
            $table->float('ak_dasar', places: 2);
            $table->float('ak_max_bangprof_penunjang', places: 2);
            $table->float('ak_max_penunjang', places: 2);
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
        Schema::dropIfExists('ketentuan_nilais');
    }
};
