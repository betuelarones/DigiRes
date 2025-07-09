<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Resources\ReservationResource\Widgets\ReservationStats; // Add this line or correct the namespace as needed

class ListReservations extends ListRecords
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            ReservationStats::class
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Todas'),
            'pending' => Tab::make('Pendiente')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'pending')),
            'confirmed' => Tab::make('Confirmada')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'confirmed')),
            'cancelled' => Tab::make('Cancelada')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'cancelled')),
            'finished' => Tab::make('Finalizada')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'finished')),
        ];
    }
}
