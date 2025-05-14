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
        Schema::create('tipo_habitacion_acomodacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_habitacion_id')->constrained('tipo_habitaciones')->onDelete('cascade');
            $table->foreignId('acomodacion_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_habitacion_acomodacion');
    }
};
