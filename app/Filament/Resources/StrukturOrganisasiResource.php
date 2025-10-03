<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Models\StrukturOrganisasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon  = 'heroicon-o-rectangle-group';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationLabel = 'Struktur Organisasi';
    protected static ?int    $navigationSort  = 3;

    /** Karena single-record, kita cukup definisikan form saja */
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Konten Struktur Organisasi')
                ->description('Isi judul, subjudul, dan upload satu gambar struktur.')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->maxLength(150)
                        ->required()
                        ->placeholder('Struktur Organisasi'),

                    Forms\Components\TextInput::make('subtitle')
                        ->label('Subjudul')
                        ->maxLength(200)
                        ->placeholder('Struktur organisasi Fakultas Teknik Universitas Negeri Manado'),

                    Forms\Components\FileUpload::make('image_path')
                        ->label('Gambar Struktur (PNG/JPG/WebP)')
                        ->image()
                        ->imageEditor()
                        ->directory('pages/struktur')  // storage/app/public/pages/struktur
                        ->disk('public')
                        ->maxSize(4096)                 // 4 MB
                        ->openable()
                        ->downloadable()
                        ->helperText('Disarankan rasio lebar (contoh 1600×1000). Maks 4MB.'),
                ])
                ->columns(1),
        ]);
    }

    /** Single-record: arahkan navigasi ke page Edit sebagai "index" */
    public static function getPages(): array
    {
        return [
            'index' => Pages\EditStrukturOrganisasi::route('/'),
        ];
    }

    /** (Opsional) badge kecil di sidebar */
    public static function getNavigationBadge(): ?string
    {
        return '1';
    }
}
