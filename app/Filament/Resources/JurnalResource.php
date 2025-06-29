<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurnalResource\Pages;
use App\Filament\Resources\JurnalResource\RelationManagers;
use App\Models\Jurnal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurnalResource extends Resource
{
    protected static ?string $model = Jurnal::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    protected static ?string $navigationGroup = 'Unit';
    
    protected static ?string $navigationLabel = 'Jurnal Akademik';
    
    protected static ?string $modelLabel = 'Jurnal Akademik';
    
    protected static ?string $pluralModelLabel = 'Jurnal Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar Jurnal')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Jurnal')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Jurnal Sistem Informasi'),
                        
                        Forms\Components\Select::make('jurusan')
                            ->label('Program Studi/Jurusan')
                            ->required()
                            ->options([
                                'teknik-informatika' => 'Teknik Informatika',
                                'teknik-sipil' => 'Teknik Sipil',
                                'teknik-elektro' => 'Teknik Elektro',
                                'teknik-mesin' => 'Teknik Mesin',
                                'arsitektur' => 'Arsitektur',
                                'teknik-bangunan' => 'Teknik Bangunan',
                            ])
                            ->placeholder('Pilih program studi'),
                        
                        Forms\Components\TextInput::make('issn')
                            ->label('ISSN')
                            ->placeholder('Contoh: 1234-5678')
                            ->helperText('Nomor ISSN jurnal (opsional)'),
                        
                        Forms\Components\TextInput::make('penerbit')
                            ->label('Penerbit')
                            ->placeholder('Contoh: Fakultas Teknik UNIMA')
                            ->helperText('Nama penerbit jurnal'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Informasi Publikasi')
                    ->schema([
                        Forms\Components\Select::make('periode_terbit')
                            ->label('Periode Terbit')
                            ->options([
                                '2x per tahun' => '2x per tahun',
                                '3x per tahun' => '3x per tahun',
                                '4x per tahun' => '4x per tahun',
                                '6x per tahun' => '6x per tahun',
                                '12x per tahun' => '12x per tahun',
                            ])
                            ->placeholder('Pilih periode terbit'),
                        
                        Forms\Components\TextInput::make('website')
                            ->label('Website Jurnal')
                            ->url()
                            ->placeholder('https://jurnal.unima.ac.id/...')
                            ->helperText('Link website jurnal jika ada'),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email Jurnal')
                            ->email()
                            ->placeholder('jurnal@unima.ac.id')
                            ->helperText('Email kontak jurnal'),
                    ])->columns(3),
                
                Forms\Components\Section::make('Deskripsi dan Ruang Lingkup')
                    ->schema([
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Jurnal')
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang jurnal ini...')
                            ->helperText('Penjelasan singkat tentang jurnal'),
                        
                        Forms\Components\Textarea::make('scope')
                            ->label('Ruang Lingkup')
                            ->rows(4)
                            ->placeholder('Ruang lingkup penelitian yang diterima jurnal ini...')
                            ->helperText('Bidang-bidang penelitian yang diterima'),
                        
                        Forms\Components\Textarea::make('panduan_penulisan')
                            ->label('Panduan Penulisan')
                            ->rows(4)
                            ->placeholder('Panduan untuk penulis yang ingin submit artikel...')
                            ->helperText('Panduan penulisan artikel untuk jurnal ini'),
                    ])->columns(1),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif (Ditampilkan)',
                                'nonaktif' => 'Nonaktif (Disembunyikan)',
                            ])
                            ->default('aktif')
                            ->required(),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Urutan tampilan jurnal (1 = pertama)'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Jurnal')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Program Studi')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ucwords(str_replace('-', ' ', $state)))
                    ->color(fn ($state) => match ($state) {
                        'teknik-informatika' => 'primary',
                        'teknik-sipil' => 'success',
                        'teknik-elektro' => 'warning',
                        'teknik-mesin' => 'danger',
                        'arsitektur' => 'secondary',
                        'teknik-bangunan' => 'info',
                        default => 'secondary',
                    }),
                
                Tables\Columns\TextColumn::make('issn')
                    ->label('ISSN')
                    ->placeholder('Belum ada')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('periode_terbit')
                    ->label('Periode Terbit')
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state === 'aktif' ? '✅ Aktif' : '❌ Nonaktif')
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jurusan')
                    ->label('Program Studi')
                    ->options([
                        'teknik-informatika' => 'Teknik Informatika',
                        'teknik-sipil' => 'Teknik Sipil',
                        'teknik-elektro' => 'Teknik Elektro',
                        'teknik-mesin' => 'Teknik Mesin',
                        'arsitektur' => 'Arsitektur',
                        'teknik-bangunan' => 'Teknik Bangunan',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => '✅ Aktif',
                        'nonaktif' => '❌ Nonaktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('primary')
                    ->label('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('urutan', 'asc')
            ->striped();
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
            'index' => Pages\ListJurnals::route('/'),
            'create' => Pages\CreateJurnal::route('/create'),
            'edit' => Pages\EditJurnal::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 0 ? 'success' : 'danger';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->ordered();
    }
}
