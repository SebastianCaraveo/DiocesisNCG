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
        Schema::create('parrocos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sacerdote');
            $table->foreign('id_sacerdote')->references('id')->on('sacerdotes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrocos');
    }
};
