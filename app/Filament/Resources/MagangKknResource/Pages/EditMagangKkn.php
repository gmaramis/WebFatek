<?php

namespace App\Filament\Resources\MagangKknResource\Pages;

use App\Filament\Resources\MagangKknResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMagangKkn extends EditRecord
{
    protected static string $resource = MagangKknResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
