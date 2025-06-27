<?php

namespace App\Filament\Resources\BeBeResource\Widgets;

use Filament\Widgets\ChartWidget;

class DashboardTitle extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
