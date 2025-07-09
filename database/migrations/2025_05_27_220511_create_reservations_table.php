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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();  

            $table->string('customer_name');  // Nombre completo del cliente
            $table->string('customer_phone');  // Número de celular del cliente
            $table->date('date');  // Fecha para la reserva
            $table->time('start_time');  // Hora inicio para la reserva
            $table->time('end_time')->nullable();   // Hora fin para la reserva - puede ser nulo
            $table->unsignedInteger('guests'); // Comensales - cantidad total de personas que ocuparán la mesa

            $table->foreignId('table_id') // FK - relación con la tabla de mesas
                ->constrained('tables') 
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'finished'])  // Estado de la reserva, por defecto pendiente.
                ->default('pending');  // Estados - pendiente, confirmado, cancelado y finalizado.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
        
    }
};
