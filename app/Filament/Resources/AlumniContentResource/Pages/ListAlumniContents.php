<?php

namespace App\Filament\Resources\AlumniContentResource\Pages;

use App\Filament\Resources\AlumniContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumniContents extends ListRecords
{
    protected static string $resource = AlumniContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
