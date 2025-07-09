<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Todos'),

            'fondos' => Tab::make('Fondos')
                ->modifyQueryUsing(fn ($query) => $query->whereHas('category', fn ($q) => $q->where('name', 'Fondos'))),

            'bebidas' => Tab::make('Bebidas')
                ->modifyQueryUsing(fn ($query) => $query->whereHas('category', fn ($q) => $q->where('name', 'Bebidas'))),

            'aperitivos' => Tab::make('Aperitivos')
                ->modifyQueryUsing(fn ($query) => $query->whereHas('category', fn ($q) => $q->where('name', 'Aperitivos'))),

            'postres' => Tab::make('Postres')
                ->modifyQueryUsing(fn ($query) => $query->whereHas('category', fn ($q) => $q->where('name', 'Postres'))),
        ];
    }
}
