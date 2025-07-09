<?php

namespace App\Filament\Resources\ReservationResource\Widgets;

use App\Models\Reservation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReservationStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Reservas nuevas', Reservation::query()->where('status', 'pending')->count()),
            Stat::make('Reservas confirmados', Reservation::query()->where('status', 'confirmed')->count())
        ];
    }
}
