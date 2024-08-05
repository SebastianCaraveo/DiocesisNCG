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
        Schema::create('matrimonios', function (Blueprint $table) {
            $table->id();
            $table->date('registro');
            $table->string('señor');
            $table->string('señorita');
            $table->string('testigo_señor');
            $table->string('testigo_señorita');
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
        Schema::dropIfExists('matrimonios');
    }
};
