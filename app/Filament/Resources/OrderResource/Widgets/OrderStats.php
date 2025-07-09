<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nuevos pedidos', Order::query()->where('status', 'new')->count()),
            Stat::make('Pedidos en proceso', Order::query()->where('status', 'processing')->count()),
            Stat::make('Pedidos enviados', Order::query()->where('status', 'shipped')->count())
        ];
    }
}
