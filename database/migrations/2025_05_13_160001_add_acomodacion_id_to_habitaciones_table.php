<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            if (!Schema::hasColumn('habitaciones', 'acomodacion_id')) { 
                $table->foreignId('acomodacion_id')->nullable()->constrained('acomodacions')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            if (Schema::hasColumn('habitaciones', 'acomodacion_id')) {
                $table->dropForeign(['acomodacion_id']);
                $table->dropColumn('acomodacion_id');
            }
        });
    }
};
