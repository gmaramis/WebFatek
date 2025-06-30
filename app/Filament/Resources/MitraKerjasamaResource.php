<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MitraKerjasamaResource\Pages;
use App\Filament\Resources\MitraKerjasamaResource\RelationManagers;
use App\Models\MitraKerjasama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MitraKerjasamaResource extends Resource
{
    protected static ?string $model = MitraKerjasama::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    
    protected static ?string $navigationGroup = 'Humas & Kerjasama';
    
    protected static ?string $navigationLabel = 'Mitra Kerjasama';
    
    protected static ?string $modelLabel = 'Mitra Kerjasama';
    
    protected static ?string $pluralModelLabel = 'Mitra Kerjasama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('nama_instansi')
                            ->label('Nama Instansi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: PT Telkom Indonesia')
                            ->helperText('Nama lengkap instansi atau lembaga mitra'),
                        
                        Forms\Components\Select::make('kategori')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'Perusahaan' => 'Perusahaan',
                                'Universitas' => 'Universitas',
                                'Pemerintah' => 'Pemerintah',
                                'Lembaga Penelitian' => 'Lembaga Penelitian',
                                'Organisasi' => 'Organisasi',
                            ])
                            ->placeholder('Pilih kategori instansi')
                            ->helperText('Kategori instansi mitra kerjasama'),
                        
                        Forms\Components\Select::make('jurusan')
                            ->label('Jurusan')
                            ->required()
                            ->options([
                                'Teknik Informatika' => 'Teknik Informatika',
                                'Teknik Sipil' => 'Teknik Sipil',
                                'Teknik Elektro' => 'Teknik Elektro',
                                'Teknik Mesin' => 'Teknik Mesin',
                                'Arsitektur' => 'Arsitektur',
                                'Teknik Bangunan' => 'Teknik Bangunan',
                                'Semua Jurusan' => 'Semua Jurusan',
                            ])
                            ->placeholder('Pilih jurusan yang terkait')
                            ->helperText('Jurusan yang terkait dengan kerjasama'),
                    ])->columns(3),

                Forms\Components\Section::make('Detail Kerjasama')
                    ->schema([
                        Forms\Components\Textarea::make('bentuk_kerjasama')
                            ->label('Bentuk Kerjasama')
                            ->required()
                            ->rows(3)
                            ->placeholder('Contoh: Magang, Penelitian, Pengembangan SDM, Kuliah Tamu')
                            ->helperText('Jelaskan bentuk-bentuk kerjasama yang dilakukan'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi (Opsional)')
                            ->rows(3)
                            ->placeholder('Deskripsi tambahan tentang instansi atau kerjasama')
                            ->helperText('Deskripsi tambahan jika diperlukan'),
                    ])->columns(1),

                Forms\Components\Section::make('Informasi Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('alamat')
                            ->label('Alamat')
                            ->maxLength(255)
                            ->placeholder('Alamat kantor pusat instansi'),
                        
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->url()
                            ->placeholder('https://www.example.com')
                            ->helperText('Website resmi instansi'),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('contact@example.com')
                            ->helperText('Email kontak utama'),
                        
                        Forms\Components\TextInput::make('telepon')
                            ->label('Telepon')
                            ->placeholder('+62-21-12345678')
                            ->helperText('Nomor telepon kontak'),
                    ])->columns(2),

                Forms\Components\Section::make('Dokumen & Periode')
                    ->schema([
                        Forms\Components\DatePicker::make('tanggal_mou')
                            ->label('Tanggal MOU')
                            ->placeholder('Pilih tanggal penandatanganan MOU')
                            ->helperText('Tanggal penandatanganan Memorandum of Understanding'),
                        
                        Forms\Components\DatePicker::make('tanggal_berakhir')
                            ->label('Tanggal Berakhir')
                            ->placeholder('Pilih tanggal berakhir kerjasama')
                            ->helperText('Tanggal berakhir kerjasama (opsional)'),
                        
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Instansi')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('200')
                            ->imageResizeTargetHeight('200')
                            ->helperText('Upload logo instansi (format: JPG, PNG. Maksimal 1MB)')
                            ->maxSize(1024)
                            ->directory('mitra-logos'),
                    ])->columns(3),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status Kerjasama')
                            ->required()
                            ->options([
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                                'pending' => 'Pending',
                            ])
                            ->default('aktif')
                            ->placeholder('Pilih status kerjasama'),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Urutan tampilan di website (1 = pertama)'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Mitra akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->size(40)
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=Mitra&color=3b82f6&background=dbeafe'),

                Tables\Columns\TextColumn::make('nama_instansi')
                    ->label('Nama Instansi')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Perusahaan' => 'blue',
                        'Universitas' => 'green',
                        'Pemerintah' => 'purple',
                        'Lembaga Penelitian' => 'orange',
                        'Organisasi' => 'indigo',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Teknik Informatika' => 'blue',
                        'Teknik Sipil' => 'green',
                        'Teknik Elektro' => 'yellow',
                        'Teknik Mesin' => 'red',
                        'Arsitektur' => 'purple',
                        'Teknik Bangunan' => 'indigo',
                        'Semua Jurusan' => 'gray',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('bentuk_kerjasama')
                    ->label('Bentuk Kerjasama')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match($state) {
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                        'pending' => 'Pending',
                        default => $state,
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Tampil')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Perusahaan' => 'Perusahaan',
                        'Universitas' => 'Universitas',
                        'Pemerintah' => 'Pemerintah',
                        'Lembaga Penelitian' => 'Lembaga Penelitian',
                        'Organisasi' => 'Organisasi',
                    ])
                    ->label('Kategori'),

                Tables\Filters\SelectFilter::make('jurusan')
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Teknik Sipil' => 'Teknik Sipil',
                        'Teknik Elektro' => 'Teknik Elektro',
                        'Teknik Mesin' => 'Teknik Mesin',
                        'Arsitektur' => 'Arsitektur',
                        'Teknik Bangunan' => 'Teknik Bangunan',
                        'Semua Jurusan' => 'Semua Jurusan',
                    ])
                    ->label('Jurusan'),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                        'pending' => 'Pending',
                    ])
                    ->label('Status'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Tampil'),
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
            'index' => Pages\ListMitraKerjasamas::route('/'),
            'create' => Pages\CreateMitraKerjasama::route('/create'),
            'edit' => Pages\EditMitraKerjasama::route('/{record}/edit'),
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
        return parent::getEloquentQuery()
            ->ordered()
            ->select([
                'id', 
                'nama_instansi', 
                'kategori', 
                'jurusan', 
                'bentuk_kerjasama',
                'status', 
                'urutan', 
                'is_active', 
                'updated_at', 
                'logo'
            ]);
    }
}
