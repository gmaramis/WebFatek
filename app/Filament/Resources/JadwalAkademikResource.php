<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalAkademikResource\Pages;
use App\Models\JadwalAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalAkademikResource extends Resource
{
    protected static ?string $model = JadwalAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Jadwal Akademik';

    protected static ?string $modelLabel = 'Jadwal Akademik';

    protected static ?string $pluralModelLabel = 'Jadwal Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar Jadwal')
                    ->schema([
                        Forms\Components\Select::make('jenis_jadwal')
                            ->label('Pilih Jenis Jadwal')
                            ->options([
                                'semester_ganjil' => '📚 Semester Ganjil',
                                'semester_genap' => '📖 Semester Genap', 
                                'semester_pendek' => '⏰ Semester Pendek',
                                'uts' => '📝 Ujian Tengah Semester (UTS)',
                                'libur_akademik' => '🏖️ Libur Akademik',
                                'wisuda' => '🎓 Wisuda',
                                'pendaftaran' => '👥 Pendaftaran Mahasiswa Baru',
                            ])
                            ->required()
                            ->helperText('Pilih jenis jadwal yang ingin dikelola'),
                        
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Jadwal')
                            ->required()
                            ->placeholder('Contoh: Semester Ganjil 2024/2025')
                            ->helperText('Judul yang akan ditampilkan di website'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(2)
                            ->placeholder('Contoh: Periode perkuliahan semester ganjil dengan berbagai kegiatan akademik')
                            ->helperText('Penjelasan singkat tentang jadwal ini'),
                    ])->columns(2),

                Forms\Components\Section::make('Pengaturan Tampilan')
                    ->schema([
                        Forms\Components\Select::make('warna')
                            ->label('Warna Jadwal')
                            ->options([
                                'blue' => '🔵 Biru',
                                'green' => '🟢 Hijau', 
                                'yellow' => '🟡 Kuning',
                                'red' => '🔴 Merah',
                                'orange' => '🟠 Orange',
                                'purple' => '🟣 Ungu',
                                'teal' => '🔷 Teal',
                                'indigo' => '🟦 Indigo',
                            ])
                            ->default('blue')
                            ->required()
                            ->helperText('Warna yang akan ditampilkan di website'),
                        
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (Opsional)')
                            ->placeholder('Contoh: fas fa-calendar-day')
                            ->helperText('Icon FontAwesome (bisa dikosongkan)'),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Angka kecil = tampil di atas'),
                        
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => '✅ Aktif (Ditampilkan)',
                                'nonaktif' => '❌ Nonaktif (Disembunyikan)',
                            ])
                            ->default('aktif')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Periode Waktu')
                    ->schema([
                        Forms\Components\TextInput::make('periode.mulai')
                            ->label('Periode Mulai')
                            ->placeholder('Contoh: Agustus 2024')
                            ->helperText('Kapan jadwal ini dimulai'),
                        
                        Forms\Components\TextInput::make('periode.selesai')
                            ->label('Periode Selesai')
                            ->placeholder('Contoh: Desember 2024')
                            ->helperText('Kapan jadwal ini berakhir'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Jadwal')
                    ->description('Isi detail-detail jadwal sesuai kebutuhan. Contoh: perkuliahan, ujian, libur, dll.')
                    ->schema([
                        Forms\Components\KeyValue::make('jadwal_detail')
                            ->label('Detail Jadwal')
                            ->keyLabel('Nama Detail')
                            ->valueLabel('Keterangan')
                            ->addActionLabel('➕ Tambah Detail')
                            ->deleteActionLabel('🗑️ Hapus')
                            ->reorderable()
                            ->helperText('Contoh: <b>Perkuliahan</b> = Agustus - Desember, <b>Ujian</b> = Desember, <b>Libur</b> = Natal & Tahun Baru')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Catatan Tambahan (Opsional)')
                    ->schema([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(2)
                            ->placeholder('Contoh: Jadwal dapat berubah sesuai kebijakan universitas')
                            ->helperText('Catatan tambahan yang akan ditampilkan di website'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_jadwal')
                    ->label('Jenis Jadwal')
                    ->formatStateUsing(fn ($state) => match($state) {
                        'semester_ganjil' => '📚 Semester Ganjil',
                        'semester_genap' => '📖 Semester Genap',
                        'semester_pendek' => '⏰ Semester Pendek',
                        'uts' => '📝 UTS',
                        'libur_akademik' => '🏖️ Libur Akademik',
                        'wisuda' => '🎓 Wisuda',
                        'pendaftaran' => '👥 Pendaftaran',
                        default => ucfirst(str_replace('_', ' ', $state)),
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('periode_formatted')
                    ->label('Periode')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('warna')
                    ->label('Warna')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'blue' => '🔵 Biru',
                        'green' => '🟢 Hijau',
                        'yellow' => '🟡 Kuning',
                        'red' => '🔴 Merah',
                        'orange' => '🟠 Orange',
                        'purple' => '🟣 Ungu',
                        'teal' => '🔷 Teal',
                        'indigo' => '🟦 Indigo',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'blue' => 'blue',
                        'green' => 'green',
                        'yellow' => 'yellow',
                        'red' => 'red',
                        'orange' => 'orange',
                        'purple' => 'purple',
                        'teal' => 'teal',
                        'indigo' => 'indigo',
                        default => 'gray',
                    }),

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
                Tables\Filters\SelectFilter::make('jenis_jadwal')
                    ->label('Jenis Jadwal')
                    ->options([
                        'semester_ganjil' => '📚 Semester Ganjil',
                        'semester_genap' => '📖 Semester Genap',
                        'semester_pendek' => '⏰ Semester Pendek',
                        'uts' => '📝 Ujian Tengah Semester',
                        'libur_akademik' => '🏖️ Libur Akademik',
                        'wisuda' => '🎓 Wisuda',
                        'pendaftaran' => '👥 Pendaftaran Mahasiswa Baru',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => '✅ Aktif',
                        'nonaktif' => '❌ Nonaktif',
                    ]),

                Tables\Filters\SelectFilter::make('warna')
                    ->label('Warna')
                    ->options([
                        'blue' => '🔵 Biru',
                        'green' => '🟢 Hijau',
                        'yellow' => '🟡 Kuning',
                        'red' => '🔴 Merah',
                        'orange' => '🟠 Orange',
                        'purple' => '🟣 Ungu',
                        'teal' => '🔷 Teal',
                        'indigo' => '🟦 Indigo',
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
            'index' => Pages\ListJadwalAkademiks::route('/'),
            'create' => Pages\CreateJadwalAkademik::route('/create'),
            'edit' => Pages\EditJadwalAkademik::route('/{record}/edit'),
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