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
        Schema::create('sacramentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->string('tipo');
            $table->unsignedBigInteger('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->unsignedBigInteger('libro_sacramento_id');
            $table->foreign('libro_sacramento_id')->references('id')->on('libro_sacramentos');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sacramentos');
    }
};
