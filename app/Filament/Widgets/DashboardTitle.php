<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardTitle extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-title';
    
    protected int | string | array $columnSpan = 'full';
}
