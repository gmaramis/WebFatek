<?php

namespace App\Filament\Resources\PedomanAkademikResource\Pages;

use App\Filament\Resources\PedomanAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPedomanAkademiks extends ListRecords
{
    protected static string $resource = PedomanAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pedoman Akademik')
                ->icon('heroicon-o-plus'),
        ];
    }
} 