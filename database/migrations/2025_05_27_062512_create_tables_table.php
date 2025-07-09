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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique(); // Código de mesa - ÚNICO “M1”, “M2”
            $table->unsignedInteger('capacity');  // Capacidad: cuantas personas pueden ocupar la mesa
            
            $table->enum('status', ['available', 'occupied'])
                ->default('available'); // Estados (ocupada, disponible)
            
            $table->string('location')->nullable(); // Ubicación - primer o segundo piso

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
        
    }
};
