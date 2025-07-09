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
        Schema::create('simulated_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(); // relación con Order
            $table->string('cardholder');
            $table->string('cardnumber'); // en producción esto no se guarda así
            $table->string('expiry');
            $table->string('cvc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulated_payments');
    }
};
