<?php

namespace App\Filament\Resources\AlumniContentResource\Pages;

use App\Filament\Resources\AlumniContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumniContent extends EditRecord
{
    protected static string $resource = AlumniContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
