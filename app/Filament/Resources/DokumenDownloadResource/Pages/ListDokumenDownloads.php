<?php

namespace App\Filament\Resources\DokumenDownloadResource\Pages;

use App\Filament\Resources\DokumenDownloadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenDownloads extends ListRecords
{
    protected static string $resource = DokumenDownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
