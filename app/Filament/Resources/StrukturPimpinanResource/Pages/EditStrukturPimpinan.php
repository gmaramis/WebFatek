<?php

namespace App\Filament\Resources\StrukturPimpinanResource\Pages;

use App\Filament\Resources\StrukturPimpinanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrukturPimpinan extends EditRecord
{
    protected static string $resource = StrukturPimpinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
