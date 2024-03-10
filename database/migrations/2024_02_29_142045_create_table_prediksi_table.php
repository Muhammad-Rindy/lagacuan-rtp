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
        Schema::create('table_prediksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasaran_id')->constrained('table_pasaran')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('angka_main');
            $table->string('top_4d');
            $table->string('top_3d');
            $table->string('top_2d');
            $table->string('colok_bebas');
            $table->string('colok_2d');
            $table->string('shio_jitu');
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
        Schema::dropIfExists('table_prediksi');
    }
};
