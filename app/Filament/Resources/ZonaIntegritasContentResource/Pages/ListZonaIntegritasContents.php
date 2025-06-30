<?php

namespace App\Filament\Resources\ZonaIntegritasContentResource\Pages;

use App\Filament\Resources\ZonaIntegritasContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZonaIntegritasContents extends ListRecords
{
    protected static string $resource = ZonaIntegritasContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
