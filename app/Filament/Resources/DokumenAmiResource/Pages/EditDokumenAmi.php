<?php

namespace App\Filament\Resources\DokumenAmiResource\Pages;

use App\Filament\Resources\DokumenAmiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDokumenAmi extends EditRecord
{
    protected static string $resource = DokumenAmiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
