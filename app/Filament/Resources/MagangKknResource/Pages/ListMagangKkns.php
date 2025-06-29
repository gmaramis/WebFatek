<?php

namespace App\Filament\Resources\MagangKknResource\Pages;

use App\Filament\Resources\MagangKknResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMagangKkns extends ListRecords
{
    protected static string $resource = MagangKknResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
