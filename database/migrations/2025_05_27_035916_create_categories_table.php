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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // Nombre de la categoría.
            $table->string('slug')->unique(); // Slug: parte de una URL que identifica una página específica en un sitio web de forma legible. Una cadena de texto separada por guiones
            $table->string('image')->nullable(); // Imagen que hace referencia a la categoría.
            $table->boolean('is_active')->default(true); // Estado de la categoría por defecto siempre True.

            $table->timestamps(); // FECHA DE CREACIÓN Y MODIFICACIÓN
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
