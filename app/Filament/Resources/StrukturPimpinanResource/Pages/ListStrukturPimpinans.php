<?php

namespace App\Filament\Resources\StrukturPimpinanResource\Pages;

use App\Filament\Resources\StrukturPimpinanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrukturPimpinans extends ListRecords
{
    protected static string $resource = StrukturPimpinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
