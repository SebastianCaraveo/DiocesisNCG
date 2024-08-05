<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comunions', function (Blueprint $table) {
            $table->id();
            $table->date('registro');
            $table->string('padrino');
            $table->string('madrina');
            $table->string('bautismo');
            $table->string('lugar_bautismo');
            $table->string('fecha_bautismo');
            $table->string('notas')->nullable();
            $table->string('celebrante');
            $table->unsignedBigInteger('sacramento_id');
            $table->foreign('sacramento_id')->references('id')->on('sacramentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunions');
    }
};
