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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('orders')
                ->cascadeOnDelete(); // FK - Relación con el pedido.

            $table->string('first_name'); // Nombres del cliente
            $table->string('last_name'); // Apellidos del cliente
            $table->string('phone')->nullable(); // Teléfono o celular.
            $table->string('district')->nullable(); // Distrito
            $table->text('street_address')->nullable(); // Dirección para la entrega
            $table->string('reference')->nullable();  // Referencia

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
