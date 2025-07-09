<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    // Si por convención tu modelo se llama "Table" y la tabla es "tables",
    // no necesitas especificar $table. Laravel lo infiere automáticamente.
    protected $fillable = [
        'code',
        'capacity',
        'status',
        'location',
    ];

    /**
     * Una mesa puede tener muchas reservas.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Un scope para filtrar solo mesas disponibles.
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Un scope para filtrar solo mesas ocupadas.
     */
    public function scopeOccupied($query)
    {
        return $query->where('status', 'occupied');
    }
}
