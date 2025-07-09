<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Reservation;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function handleRecordCreation(array $data): Reservation
    {
        $reservation = parent::handleRecordCreation($data);
        // Al crear una reserva, marca a la mesa como ocupada.
        $reservation->table->update(['status' => 'occupied']);

        return $reservation;
    }
}
