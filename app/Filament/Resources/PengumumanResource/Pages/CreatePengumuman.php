<?php

namespace App\Filament\Resources\PengumumanResource\Pages;

use App\Filament\Resources\PengumumanResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePengumuman extends CreateRecord
{
    protected static string $resource = PengumumanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        
        return static::getModel()::create($data);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pengumuman berhasil dibuat';
    }
} 