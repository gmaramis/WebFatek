<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Pengumuman;
use Filament\Widgets\Widget;

class DashboardStats extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-stats';
    protected int | string | array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'beritaCount' => Berita::count(),
            'pengumumanCount' => Pengumuman::count(),
        ];
    }
}
