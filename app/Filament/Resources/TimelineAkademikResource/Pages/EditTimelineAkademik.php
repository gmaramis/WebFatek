<?php

namespace App\Filament\Resources\TimelineAkademikResource\Pages;

use App\Filament\Resources\TimelineAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimelineAkademik extends EditRecord
{
    protected static string $resource = TimelineAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Timeline Akademik')
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Timeline Akademik berhasil diperbarui';
    }
} 