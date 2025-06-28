<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use App\Models\VisiMisi;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisiMisis extends ListRecords
{
    protected static string $resource = VisiMisiResource::class;

    protected function getHeaderActions(): array
    {
        // Cek apakah sudah ada data visi-misi
        $hasData = VisiMisi::count() > 0;
        
        // Jika sudah ada data, jangan tampilkan tombol Create
        if ($hasData) {
            return [];
        }
        
        // Jika belum ada data, tampilkan tombol Create
        return [
            Actions\CreateAction::make()
                ->label('Buat Data Visi Misi')
                ->icon('heroicon-o-plus')
                ->color('success'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // Widget untuk menampilkan pesan jika sudah ada data
        ];
    }

    public function getTitle(): string
    {
        $hasData = VisiMisi::count() > 0;
        
        if ($hasData) {
            return 'Kelola Data Visi Misi';
        }
        
        return 'Buat Data Visi Misi';
    }
}
