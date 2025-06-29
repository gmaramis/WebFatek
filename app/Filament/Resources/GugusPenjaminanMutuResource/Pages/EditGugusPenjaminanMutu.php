<?php

namespace App\Filament\Resources\GugusPenjaminanMutuResource\Pages;

use App\Filament\Resources\GugusPenjaminanMutuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGugusPenjaminanMutu extends EditRecord
{
    protected static string $resource = GugusPenjaminanMutuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
