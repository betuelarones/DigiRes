<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return[
            OrderStats::class
        ];
    }

    public function getTabs(): array
    {
        return [
        'all' => Tab::make('Todos'),

        'new' => Tab::make('Nuevo')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'new')),

        'processing' => Tab::make('En proceso')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'processing')),

        'shipped' => Tab::make('Enviado')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'shipped')),

        'delivered' => Tab::make('Entregado')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'delivered')),

        'canceled' => Tab::make('Cancelado')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'canceled')),
    ];
    }
}
