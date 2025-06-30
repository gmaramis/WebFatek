<?php

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use App\Models\Slider;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        // Hanya tampilkan tombol Create jika belum mencapai batas maksimal
        if (Slider::canAddMore()) {
            $actions[] = Actions\CreateAction::make()
                ->label('Tambah Slider Baru')
                ->icon('heroicon-o-plus');
        }

        return $actions;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // Widget untuk menampilkan informasi batas slider
        ];
    }
}
