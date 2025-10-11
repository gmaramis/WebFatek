<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrmawaResource\Pages;
use App\Filament\Resources\OrmawaResource\RelationManagers;
use App\Models\Ormawa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrmawaResource extends Resource
{
    protected static ?string $model = Ormawa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Kemahasiswaan';

    protected static ?string $navigationLabel = 'ORMAWA';

    protected static ?string $modelLabel = 'Organisasi Mahasiswa';

    protected static ?string $pluralModelLabel = 'Organisasi Mahasiswa';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar Organisasi')
                    ->schema([
                        Forms\Components\Select::make('jenis')
                            ->label('Jenis Organisasi')
                            ->required()
                            ->options([
                                'bem'     => 'BEM (Badan Eksekutif Mahasiswa)',
                                'dpm'     => 'DPM (Dewan Perwakilan Mahasiswa)',
                                'kprm'    => 'KPRM (Komisi Pemilihan Raya Mhs)',
                                'himpunan' => 'Himpunan Jurusan',
                                'ukm'     => 'UKM (Unit Kegiatan Mahasiswa)',
                            ])
                            ->default('bem')
                            ->placeholder('Pilih jenis organisasi'),

                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Organisasi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Badan Eksekutif Mahasiswa Fakultas Teknik'),

                        Forms\Components\TextInput::make('singkatan')
                            ->label('Singkatan')
                            ->maxLength(50)
                            ->placeholder('Contoh: BEM FT, HMTI, UKM Seni'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Organisasi')
                            ->required()
                            ->rows(4)
                            ->placeholder('Tulis deskripsi lengkap tentang organisasi ini...')
                            ->helperText('Deskripsi yang akan ditampilkan di halaman website'),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Kepengurusan')
                    ->schema([
                        Forms\Components\TextInput::make('ketua')
                            ->label('Nama Ketua')
                            ->placeholder('Nama ketua organisasi saat ini'),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Kontak')
                            ->email()
                            ->placeholder('ormawa@ft.unima.ac.id'),

                        Forms\Components\TextInput::make('telepon')
                            ->label('Nomor Telepon')
                            ->placeholder('+62-431-123456 ext. 123'),

                        Forms\Components\TextInput::make('lokasi')
                            ->label('Lokasi Kantor')
                            ->placeholder('Contoh: Ruang BEM Lt. 1, Gedung FT'),
                    ])->columns(2),

                Forms\Components\Section::make('Media & Sosial Media')
                    ->schema([
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->url()
                            ->placeholder('https://bem-ft.unima.ac.id'),

                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram')
                            ->placeholder('@bemft_unima'),

                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->placeholder('BEM FT UNIMA'),

                        Forms\Components\TextInput::make('youtube')
                            ->label('YouTube')
                            ->placeholder('BEM FT UNIMA Official'),
                    ])->columns(2),

                Forms\Components\Section::make('Pengaturan Tampilan')
                    ->schema([
                        Forms\Components\Select::make('warna')
                            ->label('Warna Tema')
                            ->options([
                                'orange' => '🟠 Orange (Default)',
                                'blue' => '🔵 Biru',
                                'green' => '🟢 Hijau',
                                'yellow' => '🟡 Kuning',
                                'red' => '🔴 Merah',
                                'purple' => '🟣 Ungu',
                                'teal' => '🔷 Teal',
                                'indigo' => '🟦 Indigo',
                            ])
                            ->default('orange')
                            ->required(),

                        Forms\Components\TextInput::make('icon')
                            ->label('Icon FontAwesome')
                            ->placeholder('Contoh: fas fa-users, fas fa-graduation-cap')
                            ->helperText('Icon yang akan ditampilkan di halaman website'),

                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Angka kecil = tampil di atas'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Organisasi akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Prestasi Organisasi')
                    ->description('Daftar prestasi yang telah diraih oleh organisasi ini')
                    ->schema([
                        Forms\Components\KeyValue::make('prestasi')
                            ->label('Daftar Prestasi')
                            ->keyLabel('Nama Prestasi')
                            ->valueLabel('Tahun/Keterangan')
                            ->addActionLabel('➕ Tambah Prestasi')
                            ->deleteActionLabel('🗑️ Hapus')
                            ->reorderable()
                            ->helperText('Contoh: <b>Juara 1 Kompetisi Robotik Nasional</b> = 2024, <b>Best Paper Award</b> = Konferensi Nasional 2023')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Program Unggulan')
                    ->description('Program-program unggulan yang diselenggarakan organisasi')
                    ->schema([
                        Forms\Components\KeyValue::make('program_unggulan')
                            ->label('Program Unggulan')
                            ->keyLabel('Nama Program')
                            ->valueLabel('Deskripsi Singkat')
                            ->addActionLabel('➕ Tambah Program')
                            ->deleteActionLabel('🗑️ Hapus')
                            ->reorderable()
                            ->helperText('Contoh: <b>FT Mengajar</b> = Program pengabdian ke sekolah-sekolah, <b>Startup Competition</b> = Kompetisi startup mahasiswa')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Catatan Tambahan')
                    ->schema([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(3)
                            ->placeholder('Catatan tambahan tentang organisasi ini...')
                            ->helperText('Catatan internal untuk admin (tidak ditampilkan di website)'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'bem'      => 'BEM',
                        'dpm'      => 'DPM',
                        'kprm'     => 'KPRM',
                        'himpunan' => 'Himpunan',
                        'ukm'      => 'UKM',
                        default    => ucfirst($state)
                    })
                    ->color(fn($state) => match ($state) {
                        'bem'      => 'primary',
                        'dpm'      => 'info',
                        'kprm'     => 'warning',
                        'himpunan' => 'success',
                        'ukm'      => 'gray',
                        default    => 'secondary',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Organisasi')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('ketua')
                    ->label('Ketua')
                    ->placeholder('Belum ditentukan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->placeholder('Belum diisi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('warna')
                    ->label('Warna')
                    ->badge()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'orange' => '🟠 Orange',
                        'blue' => '🔵 Biru',
                        'green' => '🟢 Hijau',
                        'yellow' => '🟡 Kuning',
                        'red' => '🔴 Merah',
                        'purple' => '🟣 Ungu',
                        'teal' => '🔷 Teal',
                        'indigo' => '🟦 Indigo',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'orange' => 'orange',
                        'blue' => 'blue',
                        'green' => 'green',
                        'yellow' => 'yellow',
                        'red' => 'red',
                        'purple' => 'purple',
                        'teal' => 'teal',
                        'indigo' => 'indigo',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('prestasi_count')
                    ->label('Prestasi')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('program_count')
                    ->label('Program')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jenis')
                    ->label('Jenis Organisasi')
                    ->options([
                        'bem'      => 'BEM',
                        'dpm'      => 'DPM',
                        'kprm'     => 'KPRM',
                        'himpunan' => 'Himpunan Jurusan',
                        'ukm'      => 'UKM',
                    ]),


                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListOrmawas::route('/'),
            'create' => Pages\CreateOrmawa::route('/create'),
            'edit' => Pages\EditOrmawa::route('/{record}/edit'),
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
