<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyLayananResource\Pages;
use App\Filament\Resources\SurveyLayananResource\RelationManagers;
use App\Models\SurveyLayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurveyLayananResource extends Resource
{
    protected static ?string $model = SurveyLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    
    protected static ?string $navigationGroup = 'Kemahasiswaan';
    
    protected static ?string $navigationLabel = 'Survey Layanan';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Responden')
                    ->schema([
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('telepon')
                            ->label('Nomor Telepon')
                            ->required()
                            ->maxLength(20),
                        
                        Forms\Components\Select::make('kategori_responden')
                            ->label('Kategori Responden')
                            ->required()
                            ->options([
                                'mahasiswa' => 'Mahasiswa',
                                'dosen' => 'Dosen',
                                'tenaga_kependidikan' => 'Tenaga Kependidikan',
                                'alumni' => 'Alumni',
                                'pemangku_kepentingan' => 'Pemangku Kepentingan',
                            ])
                            ->reactive(),
                        
                        Forms\Components\Select::make('program_studi')
                            ->label('Program Studi')
                            ->options([
                                'teknik-informatika' => 'Teknik Informatika',
                                'teknik-sipil' => 'Teknik Sipil',
                                'teknik-elektro' => 'Teknik Elektro',
                                'teknik-mesin' => 'Teknik Mesin',
                                'arsitektur' => 'Arsitektur',
                                'teknik-bangunan' => 'Teknik Bangunan',
                            ])
                            ->visible(fn ($get) => in_array($get('kategori_responden'), ['mahasiswa', 'alumni'])),
                        
                        Forms\Components\TextInput::make('unit_kerja')
                            ->label('Unit Kerja')
                            ->maxLength(100)
                            ->visible(fn ($get) => in_array($get('kategori_responden'), ['dosen', 'tenaga_kependidikan'])),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Layanan')
                    ->schema([
                        Forms\Components\Select::make('jenis_layanan')
                            ->label('Jenis Layanan')
                            ->required()
                            ->options([
                                'akademik' => 'Akademik',
                                'kemahasiswaan' => 'Kemahasiswaan',
                                'keuangan' => 'Keuangan',
                                'sarana_prasarana' => 'Sarana & Prasarana',
                                'teknologi_informasi' => 'Teknologi Informasi',
                                'kerjasama' => 'Kerjasama',
                                'umum' => 'Layanan Umum',
                                'lainnya' => 'Lainnya',
                            ]),
                        
                        Forms\Components\TextInput::make('layanan_spesifik')
                            ->label('Layanan Spesifik')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('tanggal_layanan')
                            ->label('Tanggal Layanan')
                            ->required()
                            ->default(now()),
                    ])->columns(2),

                Forms\Components\Section::make('Penilaian Layanan')
                    ->schema([
                        Forms\Components\Select::make('kemudahan_akses')
                            ->label('Kemudahan Akses')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('kecepatan_pelayanan')
                            ->label('Kecepatan Pelayanan')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('keramahan_petugas')
                            ->label('Keramahan Petugas')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('kejelasan_informasi')
                            ->label('Kejelasan Informasi')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('kualitas_hasil')
                            ->label('Kualitas Hasil')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('kepuasan_keseluruhan')
                            ->label('Kepuasan Keseluruhan')
                            ->required()
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Feedback & Saran')
                    ->schema([
                        Forms\Components\Textarea::make('komentar_positif')
                            ->label('Komentar Positif')
                            ->rows(3)
                            ->maxLength(1000),
                        
                        Forms\Components\Textarea::make('komentar_negatif')
                            ->label('Komentar Negatif')
                            ->rows(3)
                            ->maxLength(1000),
                        
                        Forms\Components\Textarea::make('saran_perbaikan')
                            ->label('Saran Perbaikan')
                            ->rows(3)
                            ->maxLength(1000),
                    ])->columns(1),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                            ])
                            ->default('aktif')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('kategori_responden')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'mahasiswa' => 'primary',
                        'dosen' => 'success',
                        'tenaga_kependidikan' => 'warning',
                        'alumni' => 'info',
                        'pemangku_kepentingan' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'mahasiswa' => 'Mahasiswa',
                        'dosen' => 'Dosen',
                        'tenaga_kependidikan' => 'Tenaga Kependidikan',
                        'alumni' => 'Alumni',
                        'pemangku_kepentingan' => 'Pemangku Kepentingan',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('jenis_layanan')
                    ->label('Jenis Layanan')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'keuangan' => 'Keuangan',
                        'sarana_prasarana' => 'Sarana & Prasarana',
                        'teknologi_informasi' => 'Teknologi Informasi',
                        'kerjasama' => 'Kerjasama',
                        'umum' => 'Layanan Umum',
                        'lainnya' => 'Lainnya',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('kepuasan_keseluruhan')
                    ->label('Kepuasan')
                    ->badge()
                    ->color(fn (int $state): string => match ($state) {
                        1, 2 => 'danger',
                        3 => 'warning',
                        4, 5 => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        1 => '1 - Sangat Tidak Puas',
                        2 => '2 - Tidak Puas',
                        3 => '3 - Cukup',
                        4 => '4 - Puas',
                        5 => '5 - Sangat Puas',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('tanggal_layanan')
                    ->label('Tanggal')
                    ->date()
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
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_responden')
                    ->label('Kategori Responden')
                    ->options([
                        'mahasiswa' => 'Mahasiswa',
                        'dosen' => 'Dosen',
                        'tenaga_kependidikan' => 'Tenaga Kependidikan',
                        'alumni' => 'Alumni',
                        'pemangku_kepentingan' => 'Pemangku Kepentingan',
                    ]),
                
                Tables\Filters\SelectFilter::make('jenis_layanan')
                    ->label('Jenis Layanan')
                    ->options([
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'keuangan' => 'Keuangan',
                        'sarana_prasarana' => 'Sarana & Prasarana',
                        'teknologi_informasi' => 'Teknologi Informasi',
                        'kerjasama' => 'Kerjasama',
                        'umum' => 'Layanan Umum',
                        'lainnya' => 'Lainnya',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListSurveyLayanans::route('/'),
            'create' => Pages\CreateSurveyLayanan::route('/create'),
            'view' => Pages\ViewSurveyLayanan::route('/{record}'),
            'edit' => Pages\EditSurveyLayanan::route('/{record}/edit'),
        ];
    }
}
