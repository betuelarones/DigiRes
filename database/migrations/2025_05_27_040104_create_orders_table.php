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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete(); // FK - Relación con la tabla de usuario o cliente.

            $table->decimal('grand_total', 10, 2); // Precio total del pedido.
            $table->string('payment_method'); // Método de pago
            $table->string('payment_status'); // Estado del pago
            $table->enum('status', ['new', 'processing', 'shipped', 'delivered', 'canceled'])
                ->default('new'); // Estado del pedido - en proceso, enviado, entregado y cancelado.
            $table->text('notes')->nullable(); // Notas adicionales para el pedido.


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        
    }
};
