<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KalenderAkademikResource\Pages;
use App\Models\KalenderAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KalenderAkademikResource extends Resource
{
    protected static ?string $model = KalenderAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Kalender Akademik';

    protected static ?string $modelLabel = 'Kalender Akademik';

    protected static ?string $pluralModelLabel = 'Kalender Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Kalender')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Kalender Akademik Fakultas Teknik UNIMA 2024/2025'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(4)
                            ->placeholder('Deskripsi singkat tentang kalender akademik ini'),

                        Forms\Components\TextInput::make('tahun_akademik')
                            ->label('Tahun Akademik')
                            ->required()
                            ->placeholder('Contoh: 2024/2025'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                            ])
                            ->default('aktif')
                            ->required(),

                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('File PDF')
                    ->schema([
                        Forms\Components\TextInput::make('pdf_url')
                            ->label('URL Google Drive PDF')
                            ->url()
                            ->placeholder('https://drive.google.com/file/d/...')
                            ->helperText('Masukkan link Google Drive untuk file PDF kalender akademik'),

                        Forms\Components\TextInput::make('pdf_name')
                            ->label('Nama File PDF')
                            ->placeholder('Contoh: Kalender_Akademik_Fatek_2024_2025.pdf'),

                        Forms\Components\TextInput::make('pdf_size')
                            ->label('Ukuran File PDF')
                            ->placeholder('Contoh: 1.2 MB'),
                    ])->columns(3),

                Forms\Components\Section::make('File JPG')
                    ->schema([
                        Forms\Components\TextInput::make('jpg_url')
                            ->label('URL Google Drive JPG')
                            ->url()
                            ->placeholder('https://drive.google.com/file/d/...')
                            ->helperText('Masukkan link Google Drive untuk file JPG kalender akademik'),

                        Forms\Components\TextInput::make('jpg_name')
                            ->label('Nama File JPG')
                            ->placeholder('Contoh: Kalender_Akademik_Fatek_2024_2025.jpg'),

                        Forms\Components\TextInput::make('jpg_size')
                            ->label('Ukuran File JPG')
                            ->placeholder('Contoh: 800 KB'),
                    ])->columns(3),

                Forms\Components\Section::make('Informasi Tambahan')
                    ->schema([
                        Forms\Components\DatePicker::make('tanggal_update')
                            ->label('Tanggal Update')
                            ->default(now()),

                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(3)
                            ->placeholder('Catatan tambahan atau informasi khusus tentang kalender ini'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('tahun_akademik')
                    ->label('Tahun Akademik')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('available_formats')
                    ->label('Format Tersedia')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('pdf_size')
                    ->label('Ukuran PDF')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jpg_size')
                    ->label('Ukuran JPG')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_update')
                    ->label('Update Terakhir')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ]),

                Tables\Filters\SelectFilter::make('tahun_akademik')
                    ->label('Tahun Akademik')
                    ->options([
                        '2024/2025' => '2024/2025',
                        '2023/2024' => '2023/2024',
                        '2022/2023' => '2022/2023',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('urutan', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKalenderAkademiks::route('/'),
            'create' => Pages\CreateKalenderAkademik::route('/create'),
            'edit' => Pages\EditKalenderAkademik::route('/{record}/edit'),
        ];
    }
} 