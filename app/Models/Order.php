<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // cada orden pertenece a un solo usuario (La orden pertenece a un usuario).
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class); // una orden puede tener múltiples productos asociados (La orden tiene muchos productos).
    }
    public function address()
    {
        return $this->hasOne(Address::class); // que una orden tiene una única dirección de entrega (La orden tiene una dirección de entrega).
    }
    public function simulatedPayment()
    {
        return $this->hasOne(SimulatedPayment::class);
    }

}
