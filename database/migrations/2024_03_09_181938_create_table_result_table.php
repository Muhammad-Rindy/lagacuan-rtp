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
        Schema::create('table_result', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasaran_id')->constrained('table_pasaran')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('result_1');
            $table->string('result_2');
            $table->string('result_3');
            $table->string('shio');
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
        Schema::dropIfExists('table_result');
    }
};