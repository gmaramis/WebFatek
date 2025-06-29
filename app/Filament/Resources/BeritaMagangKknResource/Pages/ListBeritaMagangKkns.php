<?php

namespace App\Filament\Resources\BeritaMagangKknResource\Pages;

use App\Filament\Resources\BeritaMagangKknResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritaMagangKkns extends ListRecords
{
    protected static string $resource = BeritaMagangKknResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
