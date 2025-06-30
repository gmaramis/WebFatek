<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            //\App\Filament\Widgets\DashboardStats::class,
            \App\Filament\Widgets\DashboardTitle2::class,
            \Filament\Widgets\AccountWidget::class,
        ];
    }

    public function getColumns(): int | string | array
    {
        return 1;
    }
} 