<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\AdminDashboardGrouped;

class Dashboard extends BaseDashboard
{
    /**
     * Aquí indicas los widgets que quieres en tu Dashboard.
     */
    protected static array $widgets = [
        AdminDashboardGrouped::class,
    ];
}
