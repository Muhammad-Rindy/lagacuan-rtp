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
        Schema::create('table_jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('name_pasaran');
            $table->time('jadwal_tutup');
            $table->time('jadwal_undi');
            $table->string('situs_resmi');
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
        Schema::dropIfExists('table_jadwal');
    }
};