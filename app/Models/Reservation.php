<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Laravel infiere la tabla "reservations" a partir del nombre del modelo.
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'date',
        'start_time',
        'end_time',
        'guests',
        'table_id',
        'status',
    ];

    /**
     * Una reserva pertenece a una mesa.
     */
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    /**
     * Opcional: accessor para mostrar rango de horas de forma legible.
     */
    public function getTimeRangeAttribute(): string
    {
        return "{$this->start_time} - {$this->end_time}";
    }

    /**
     * Un scope para obtener solo reservas pendientes.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Puedes añadir scopes similares para confirmed, cancelled, finished...
}
