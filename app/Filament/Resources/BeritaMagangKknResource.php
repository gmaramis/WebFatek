<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaMagangKknResource\Pages;
use App\Filament\Resources\BeritaMagangKknResource\RelationManagers;
use App\Models\BeritaMagangKkn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeritaMagangKknResource extends Resource
{
    protected static ?string $model = BeritaMagangKkn::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?string $navigationLabel = 'Berita Magang & KKN';
    
    protected static ?string $modelLabel = 'Berita Magang & KKN';
    
    protected static ?string $pluralModelLabel = 'Berita Magang & KKN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Berita')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Penarikan Mahasiswa KKN Unima Tahun 2025'),
                        
                        Forms\Components\Select::make('kategori')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'magang' => 'Program Magang',
                                'kkn' => 'Program KKN',
                                'umum' => 'Umum',
                            ])
                            ->default('magang')
                            ->placeholder('Pilih kategori berita'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->placeholder('Deskripsi singkat berita yang akan ditampilkan di card...')
                            ->helperText('Deskripsi singkat yang akan ditampilkan di halaman website'),
                        
                        Forms\Components\DatePicker::make('tanggal_posting')
                            ->label('Tanggal Posting')
                            ->required()
                            ->default(now())
                            ->placeholder('Pilih tanggal posting'),
                        
                        Forms\Components\TextInput::make('penulis')
                            ->label('Penulis')
                            ->placeholder('Nama penulis berita')
                            ->helperText('Opsional - nama penulis berita'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Konten Berita')
                    ->schema([
                        Forms\Components\Textarea::make('konten_lengkap')
                            ->label('Konten Lengkap')
                            ->rows(8)
                            ->placeholder('Tulis konten lengkap berita di sini...')
                            ->helperText('Konten lengkap berita (opsional - untuk halaman detail)')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('link_eksternal')
                            ->label('Link Eksternal')
                            ->url()
                            ->placeholder('https://example.com/berita')
                            ->helperText('Link ke berita eksternal jika ada')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Berita')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('450')
                            ->helperText('Upload gambar berita (format: JPG, PNG. Maksimal 2MB)')
                            ->maxSize(2048)
                            ->directory('berita-magang-kkn')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Berita akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->helperText('Urutan tampilan berita (1 = pertama)'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->size(60)
                    ->circular()
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=Berita&color=ea580c&background=fef3c7'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'magang' => 'primary',
                        'kkn' => 'success',
                        'umum' => 'secondary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'magang' => 'Program Magang',
                        'kkn' => 'Program KKN',
                        'umum' => 'Umum',
                    }),
                
                Tables\Columns\TextColumn::make('tanggal_posting')
                    ->label('Tanggal Posting')
                    ->date('d M Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('penulis')
                    ->label('Penulis')
                    ->placeholder('Sistem'),
                
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->numeric(),
                
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
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'magang' => 'Program Magang',
                        'kkn' => 'Program KKN',
                        'umum' => 'Umum',
                    ])
                    ->label('Kategori'),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            ->defaultSort('tanggal_posting', 'desc');
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
            'index' => Pages\ListBeritaMagangKkns::route('/'),
            'create' => Pages\CreateBeritaMagangKkn::route('/create'),
            'edit' => Pages\EditBeritaMagangKkn::route('/{record}/edit'),
        ];
    }
}
