<?php

namespace App\Filament\Resources\MitraKerjasamaResource\Pages;

use App\Filament\Resources\MitraKerjasamaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMitraKerjasama extends EditRecord
{
    protected static string $resource = MitraKerjasamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
