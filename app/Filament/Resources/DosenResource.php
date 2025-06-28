<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Filament\Resources\DosenResource\RelationManagers;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationGroup = 'Profil';
    
    protected static ?string $navigationLabel = 'Dosen';
    
    protected static ?string $modelLabel = 'Dosen';
    
    protected static ?string $pluralModelLabel = 'Dosen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('nip')
                            ->label('NIP')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Contoh: 196501011990031001')
                            ->helperText('NIP harus unik dan sesuai format yang berlaku'),
                        
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required()
                            ->placeholder('Contoh: JOHAN REVO UNTUNG')
                            ->helperText('Masukkan nama tanpa gelar'),
                        
                        Forms\Components\TextInput::make('gelar')
                            ->label('Gelar')
                            ->placeholder('Contoh: Dr. Ir., M.T.')
                            ->helperText('Gelar akademik (opsional)'),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('nama@unima.ac.id')
                            ->helperText('Email institusi (opsional)'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Informasi Akademik')
                    ->schema([
                        Forms\Components\Select::make('pendidikan_terakhir')
                            ->label('Pendidikan Terakhir')
                            ->required()
                            ->options([
                                'S1' => 'S1 (Sarjana)',
                                'S2' => 'S2 (Magister)',
                                'S3' => 'S3 (Doktor)',
                            ])
                            ->placeholder('Pilih pendidikan terakhir'),
                        
                        Forms\Components\Select::make('jurusan')
                            ->label('Jurusan')
                            ->required()
                            ->options([
                                'teknik-informatika' => 'Teknik Informatika',
                                'teknik-sipil' => 'Teknik Sipil',
                                'teknik-elektro' => 'Teknik Elektro',
                                'teknik-mesin' => 'Teknik Mesin',
                                'arsitektur' => 'Arsitektur',
                                'teknik-bangunan' => 'Teknik Bangunan',
                            ])
                            ->placeholder('Pilih jurusan'),
                        
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'Aktif' => 'Aktif',
                                'Tidak Aktif' => 'Tidak Aktif',
                                'Tugas Belajar' => 'Tugas Belajar',
                            ])
                            ->default('Aktif')
                            ->placeholder('Pilih status'),
                        
                        Forms\Components\Textarea::make('bidang_keahlian')
                            ->label('Bidang Keahlian')
                            ->rows(3)
                            ->placeholder('Contoh: Sistem Informasi, Database, Web Development')
                            ->helperText('Bidang keahlian atau spesialisasi dosen')
                            ->columnSpanFull(),
                    ])->columns(3),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Dosen')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('300')
                            ->helperText('Upload foto dosen (format: JPG, PNG. Maksimal 2MB)')
                            ->maxSize(2048), // 2MB
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Dosen akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(40)
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=')
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama) . '&color=ea580c&background=fef3c7'),
                
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->sortable()
                    ->limit(40),
                
                Tables\Columns\BadgeColumn::make('pendidikan_terakhir')
                    ->label('Pendidikan')
                    ->colors([
                        'primary' => 'S3',
                        'success' => 'S2',
                        'warning' => 'S1',
                    ]),
                
                Tables\Columns\BadgeColumn::make('jurusan')
                    ->label('Jurusan')
                    ->formatStateUsing(fn ($state) => ucwords(str_replace('-', ' ', $state)))
                    ->colors([
                        'primary' => 'teknik-informatika',
                        'success' => 'teknik-sipil',
                        'warning' => 'teknik-elektro',
                        'danger' => 'teknik-mesin',
                        'secondary' => 'arsitektur',
                        'info' => 'teknik-bangunan',
                    ]),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'Aktif',
                        'danger' => 'Tidak Aktif',
                        'warning' => 'Tugas Belajar',
                    ]),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Tampil')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jurusan')
                    ->options([
                        'teknik-informatika' => 'Teknik Informatika',
                        'teknik-sipil' => 'Teknik Sipil',
                        'teknik-elektro' => 'Teknik Elektro',
                        'teknik-mesin' => 'Teknik Mesin',
                        'arsitektur' => 'Arsitektur',
                        'teknik-bangunan' => 'Teknik Bangunan',
                    ]),
                Tables\Filters\SelectFilter::make('pendidikan_terakhir')
                    ->options([
                        'S1' => 'S1 (Sarjana)',
                        'S2' => 'S2 (Magister)',
                        'S3' => 'S3 (Doktor)',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                        'Tugas Belajar' => 'Tugas Belajar',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Tampil'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama', 'asc');
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
