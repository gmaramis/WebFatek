<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineAkademikResource\Pages;
use App\Models\TimelineAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimelineAkademikResource extends Resource
{
    protected static ?string $model = TimelineAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Timeline Akademik';

    protected static ?string $modelLabel = 'Timeline Akademik';

    protected static ?string $pluralModelLabel = 'Timeline Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Timeline')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Timeline')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Awal Semester Ganjil'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang timeline ini'),

                        Forms\Components\Select::make('bulan')
                            ->label('Bulan')
                            ->options([
                                'Januari' => 'Januari',
                                'Februari' => 'Februari',
                                'Maret' => 'Maret',
                                'April' => 'April',
                                'Mei' => 'Mei',
                                'Juni' => 'Juni',
                                'Juli' => 'Juli',
                                'Agustus' => 'Agustus',
                                'September' => 'September',
                                'Oktober' => 'Oktober',
                                'November' => 'November',
                                'Desember' => 'Desember',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->required()
                            ->minValue(2020)
                            ->maxValue(2030)
                            ->default(2024),

                        Forms\Components\Select::make('warna')
                            ->label('Warna Timeline')
                            ->options([
                                'blue' => 'Biru',
                                'green' => 'Hijau',
                                'yellow' => 'Kuning',
                                'red' => 'Merah',
                                'orange' => 'Orange',
                                'purple' => 'Ungu',
                            ])
                            ->default('blue')
                            ->required(),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (FontAwesome)')
                            ->placeholder('Contoh: fas fa-graduation-cap')
                            ->helperText('Masukkan class FontAwesome icon (opsional)'),

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

                Forms\Components\Section::make('Catatan Tambahan')
                    ->schema([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(3)
                            ->placeholder('Catatan tambahan atau informasi khusus tentang timeline ini'),
                    ]),
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

                Tables\Columns\TextColumn::make('bulan_tahun')
                    ->label('Bulan/Tahun')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('warna')
                    ->label('Warna')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'blue' => 'blue',
                        'green' => 'green',
                        'yellow' => 'yellow',
                        'red' => 'red',
                        'orange' => 'orange',
                        'purple' => 'purple',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->formatStateUsing(fn ($state) => $state ? "<i class='{$state}'></i>" : '-')
                    ->html()
                    ->searchable(),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),

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

                Tables\Filters\SelectFilter::make('warna')
                    ->label('Warna')
                    ->options([
                        'blue' => 'Biru',
                        'green' => 'Hijau',
                        'yellow' => 'Kuning',
                        'red' => 'Merah',
                        'orange' => 'Orange',
                        'purple' => 'Ungu',
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
            'index' => Pages\ListTimelineAkademiks::route('/'),
            'create' => Pages\CreateTimelineAkademik::route('/create'),
            'edit' => Pages\EditTimelineAkademik::route('/{record}/edit'),
        ];
    }
} 