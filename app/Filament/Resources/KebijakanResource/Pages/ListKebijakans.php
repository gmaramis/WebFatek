<?php

namespace App\Filament\Resources\KebijakanResource\Pages;

use App\Filament\Resources\KebijakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKebijakans extends ListRecords
{
    protected static string $resource = KebijakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
