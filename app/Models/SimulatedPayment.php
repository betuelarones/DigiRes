<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimulatedPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cardholder',
        'cardnumber',
        'expiry',
        'cvc',
    ];

    // Relación inversa
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
