<?php

namespace App\Filament\Resources\UnitPenjaminanMutuResource\Pages;

use App\Filament\Resources\UnitPenjaminanMutuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitPenjaminanMutus extends ListRecords
{
    protected static string $resource = UnitPenjaminanMutuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
