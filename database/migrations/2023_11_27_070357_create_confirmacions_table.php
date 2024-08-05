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
        Schema::create('confirmacions', function (Blueprint $table) {
            $table->id();
            $table->string('bautizado_parroquia');
            $table->string('municipio_bautismo');
            $table->string('fecha_bautismo');
            $table->string('no_libro_bautismo');
            $table->string('folio_bautismo');
            $table->string('partida_bautismo');
            $table->string('padrinos');
            $table->date('registro');
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
        Schema::dropIfExists('confirmacions');
    }
};
