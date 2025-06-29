<?php

namespace App\Filament\Resources\PedomanAkademikResource\Pages;

use App\Filament\Resources\PedomanAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePedomanAkademik extends CreateRecord
{
    protected static string $resource = PedomanAkademikResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pedoman Akademik berhasil ditambahkan';
    }
} 