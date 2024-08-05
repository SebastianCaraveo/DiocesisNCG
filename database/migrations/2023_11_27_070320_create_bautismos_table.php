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
        Schema::create('bautismos', function (Blueprint $table) {
            $table->id();
            $table->date('registro');
            $table->string('padrinos');
            $table->string('no_partida')->nullable();
            $table->string('num_libro_rc')->nullable();
            $table->string('folio_rc')->nullable();
            $table->string('partida_rc')->nullable();
            $table->string('Delegacion_rc')->nullable();
            $table->string('celebrante');
            $table->string('lugar_confirmacion')->nullable();
            $table->string('contrajo_matrimonio')->nullable();
            $table->string('notas')->nullable();
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
        Schema::dropIfExists('bautismos');
    }
};
