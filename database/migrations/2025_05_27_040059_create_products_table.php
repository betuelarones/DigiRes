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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained('categories')
                ->cascadeOnDelete(); // FK - Relación con la tabla de categorías.
                
            $table->string('name'); // Nombre del producto. 
            $table->string('slug');  // Slug, parte de una URL que identifica una página específica en un sitio web de forma legible. Una cadena de texto separada por guiones
            $table->json('images'); // Imagen del producto
            $table->longText('description')->nullable(); // Descripción del producto.
            $table->decimal('price', 10, 2); // Precio del producto
            $table->boolean('is_active')->default(true); // Campo booleano(true o false) - Estado del producto 
            $table->boolean('in_stock')->default(true); // Campo booleano - Stock

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        
    }
};
