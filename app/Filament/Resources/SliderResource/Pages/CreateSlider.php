<?php

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use App\Models\Slider;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateSlider extends CreateRecord
{
    protected static string $resource = SliderResource::class;

    protected function beforeCreate(): void
    {
        // Cek apakah sudah mencapai batas maksimal slider
        if (!Slider::canAddMore()) {
            Notification::make()
                ->title('Batas Maksimal Slider')
                ->body('Tidak dapat menambah slider baru. Maksimal hanya 3 slider yang diperbolehkan.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
