<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationGroup = 'Kemahasiswaan';
    
    protected static ?string $navigationLabel = 'Data Alumni';
    
    protected static ?string $modelLabel = 'Alumni';
    
    protected static ?string $pluralModelLabel = 'Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Contoh: 201810123456')
                            ->helperText('Nomor Induk Mahasiswa yang unik'),
                        
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->placeholder('Contoh: Ahmad Fadillah')
                            ->helperText('Nama lengkap tanpa gelar'),
                        
                        Forms\Components\Select::make('program_studi')
                            ->label('Program Studi')
                            ->required()
                            ->options([
                                'ti' => 'Teknik Informatika',
                                'ptik' => 'Pendidikan Teknik Informatika & Komputer',
                                'ts' => 'Teknik Sipil',
                                'tm' => 'Teknik Mesin',
                                'te' => 'Teknik Elektro',
                                'ars' => 'Arsitektur',
                                'ptb' => 'Pendidikan Teknik Bangunan',
                                'pkk' => 'Pendidikan Kesejahteraan Keluarga',
                            ])
                            ->placeholder('Pilih program studi'),
                        
                        Forms\Components\TextInput::make('tahun_lulus')
                            ->label('Tahun Lulus')
                            ->required()
                            ->numeric()
                            ->minValue(1990)
                            ->maxValue(date('Y'))
                            ->placeholder('Contoh: 2020'),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->placeholder('nama@email.com'),
                        
                        Forms\Components\TextInput::make('nomor_telepon')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->placeholder('+62 812-3456-7890'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Informasi Kerja')
                    ->schema([
                        Forms\Components\Select::make('status_kerja')
                            ->label('Status Kerja')
                            ->options([
                                'bekerja' => 'Bekerja',
                                'wirausaha' => 'Wirausaha',
                                'belum_bekerja' => 'Belum Bekerja',
                                'lanjut_studi' => 'Lanjut Studi',
                            ])
                            ->placeholder('Pilih status kerja'),
                        
                        Forms\Components\TextInput::make('pekerjaan')
                            ->label('Pekerjaan')
                            ->placeholder('Contoh: Software Engineer'),
                        
                        Forms\Components\TextInput::make('perusahaan')
                            ->label('Perusahaan/Instansi')
                            ->placeholder('Contoh: Google Indonesia'),
                        
                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->placeholder('Contoh: Senior Software Engineer'),
                        
                        Forms\Components\Select::make('bidang_industri')
                            ->label('Bidang Industri')
                            ->options([
                                'teknologi' => 'Teknologi Informasi',
                                'konstruksi' => 'Konstruksi & Real Estate',
                                'manufaktur' => 'Manufaktur',
                                'energi' => 'Energi & Pertambangan',
                                'keuangan' => 'Keuangan & Perbankan',
                                'pendidikan' => 'Pendidikan',
                                'kesehatan' => 'Kesehatan',
                                'pemerintahan' => 'Pemerintahan',
                                'lainnya' => 'Lainnya',
                            ])
                            ->placeholder('Pilih bidang industri'),
                        
                        Forms\Components\TextInput::make('gaji')
                            ->label('Gaji (Opsional)')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('5000000')
                            ->helperText('Gaji dalam rupiah (opsional)'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Alamat')
                    ->schema([
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Lengkap')
                            ->rows(3)
                            ->placeholder('Alamat lengkap alumni')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Prestasi & Kontribusi')
                    ->schema([
                        Forms\Components\Textarea::make('prestasi')
                            ->label('Prestasi')
                            ->rows(3)
                            ->placeholder('Prestasi yang telah dicapai alumni')
                            ->helperText('Prestasi akademik, profesional, atau penghargaan'),
                        
                        Forms\Components\Textarea::make('kontribusi')
                            ->label('Kontribusi')
                            ->rows(3)
                            ->placeholder('Kontribusi terhadap fakultas atau masyarakat')
                            ->helperText('Kontribusi dalam bentuk mentoring, beasiswa, dll'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Alumni')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('300')
                            ->helperText('Upload foto alumni (format: JPG, PNG. Maksimal 2MB)')
                            ->maxSize(2048)
                            ->directory('alumni')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Alumni akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\Toggle::make('newsletter')
                            ->label('Newsletter')
                            ->helperText('Alumni akan menerima newsletter dan informasi kegiatan')
                            ->default(false),
                        
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(2)
                            ->placeholder('Catatan tambahan tentang alumni')
                            ->helperText('Catatan internal untuk admin'),
                    ])->columns(3),
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
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama_lengkap) . '&color=ea580c&background=fef3c7'),
                
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('program_studi_formatted')
                    ->label('Program Studi')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Teknik Informatika' => 'primary',
                        'Pendidikan Teknik Informatika & Komputer' => 'info',
                        'Teknik Sipil' => 'success',
                        'Teknik Mesin' => 'warning',
                        'Teknik Elektro' => 'danger',
                        'Arsitektur' => 'secondary',
                        'Pendidikan Teknik Bangunan' => 'gray',
                        'Pendidikan Kesejahteraan Keluarga' => 'purple',
                        default => 'secondary',
                    }),
                
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->sortable()
                    ->badge(),
                
                Tables\Columns\TextColumn::make('status_kerja_formatted')
                    ->label('Status Kerja')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Bekerja' => 'success',
                        'Wirausaha' => 'primary',
                        'Belum Bekerja' => 'warning',
                        'Lanjut Studi' => 'info',
                        default => 'secondary',
                    }),
                
                Tables\Columns\TextColumn::make('perusahaan')
                    ->label('Perusahaan')
                    ->limit(20)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('gaji_formatted')
                    ->label('Gaji')
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                Tables\Columns\IconColumn::make('newsletter')
                    ->label('Newsletter')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('program_studi')
                    ->options([
                        'ti' => 'Teknik Informatika',
                        'ptik' => 'Pendidikan Teknik Informatika & Komputer',
                        'ts' => 'Teknik Sipil',
                        'tm' => 'Teknik Mesin',
                        'te' => 'Teknik Elektro',
                        'ars' => 'Arsitektur',
                        'ptb' => 'Pendidikan Teknik Bangunan',
                        'pkk' => 'Pendidikan Kesejahteraan Keluarga',
                    ])
                    ->label('Program Studi'),
                
                Tables\Filters\SelectFilter::make('status_kerja')
                    ->options([
                        'bekerja' => 'Bekerja',
                        'wirausaha' => 'Wirausaha',
                        'belum_bekerja' => 'Belum Bekerja',
                        'lanjut_studi' => 'Lanjut Studi',
                    ])
                    ->label('Status Kerja'),
                
                Tables\Filters\SelectFilter::make('bidang_industri')
                    ->options([
                        'teknologi' => 'Teknologi Informasi',
                        'konstruksi' => 'Konstruksi & Real Estate',
                        'manufaktur' => 'Manufaktur',
                        'energi' => 'Energi & Pertambangan',
                        'keuangan' => 'Keuangan & Perbankan',
                        'pendidikan' => 'Pendidikan',
                        'kesehatan' => 'Kesehatan',
                        'pemerintahan' => 'Pemerintahan',
                        'lainnya' => 'Lainnya',
                    ])
                    ->label('Bidang Industri'),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
                
                Tables\Filters\TernaryFilter::make('newsletter')
                    ->label('Newsletter'),
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
            ->defaultSort('tahun_lulus', 'desc');
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
