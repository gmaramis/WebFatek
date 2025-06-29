<?php

namespace App\Filament\Resources\GugusPenjaminanMutuResource\Pages;

use App\Filament\Resources\GugusPenjaminanMutuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGugusPenjaminanMutus extends ListRecords
{
    protected static string $resource = GugusPenjaminanMutuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
