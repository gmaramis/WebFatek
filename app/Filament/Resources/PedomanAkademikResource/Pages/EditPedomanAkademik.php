<?php

namespace App\Filament\Resources\PedomanAkademikResource\Pages;

use App\Filament\Resources\PedomanAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPedomanAkademik extends EditRecord
{
    protected static string $resource = PedomanAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Pedoman Akademik')
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Pedoman Akademik berhasil diperbarui';
    }
} 