<?php

namespace App\Filament\Resources\TimelineAkademikResource\Pages;

use App\Filament\Resources\TimelineAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimelineAkademiks extends ListRecords
{
    protected static string $resource = TimelineAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Timeline Akademik')
                ->icon('heroicon-o-plus'),
        ];
    }
} 