<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Order;
use App\Models\Reservation;

class AdminDashboardGrouped extends Widget
{
    // Indica la vista Blade que usarás (ve al siguiente paso para crearla)
    protected static string $view = 'filament.widgets.admin-dashboard-grouped';

    // Para que ocupe todo el ancho del dashboard
    protected int|string|array $columnSpan = 'full';

    public array $orderStats = [];
    public array $reservationStats = [];

    public function mount(): void
    {
        $this->orderStats = [
            ['label' => 'Nuevos pedidos',       'count' => Order::where('status', 'new')->count()],
            ['label' => 'Pedidos en proceso',   'count' => Order::where('status', 'processing')->count()],
            ['label' => 'Pedidos enviados',     'count' => Order::where('status', 'shipped')->count()],
        ];

        $this->reservationStats = [
            ['label' => 'Reservas nuevas',     'count' => Reservation::where('status', 'pending')->count()],
            ['label' => 'Reservas confirmadas','count' => Reservation::where('status', 'confirmed')->count()],
        ];
    }
}
