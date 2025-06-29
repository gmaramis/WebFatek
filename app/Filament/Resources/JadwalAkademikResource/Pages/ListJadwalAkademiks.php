<?php

namespace App\Filament\Resources\JadwalAkademikResource\Pages;

use App\Filament\Resources\JadwalAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Filament\Forms\Components\MarkdownEditor;

class ListJadwalAkademiks extends ListRecords
{
    protected static string $resource = JadwalAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('➕ Tambah Jadwal Akademik')
                ->icon('heroicon-o-plus')
                ->color('success'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\PanduanJadwalAkademik::class,
        ];
    }

    public function mount(): void
    {
        // Tampilkan notifikasi panduan jika belum ada data
        if (static::getModel()::count() === 0) {
            Notification::make()
                ->title('Selamat Datang di Manajemen Jadwal Akademik!')
                ->body('Berikut panduan singkat untuk mengelola jadwal akademik:')
                ->persistent()
                ->actions([
                    \Filament\Notifications\Actions\Action::make('panduan')
                        ->label('Lihat Panduan Lengkap')
                        ->url('#panduan')
                        ->color('primary'),
                ])
                ->send();
        }
    }
} 