<?php

namespace App\Filament\Resources\TimelineAkademikResource\Pages;

use App\Filament\Resources\TimelineAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTimelineAkademik extends CreateRecord
{
    protected static string $resource = TimelineAkademikResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Timeline Akademik berhasil ditambahkan';
    }
} 