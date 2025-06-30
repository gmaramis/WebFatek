<?php

namespace App\Filament\Resources\MitraKerjasamaResource\Pages;

use App\Filament\Resources\MitraKerjasamaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMitraKerjasamas extends ListRecords
{
    protected static string $resource = MitraKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
