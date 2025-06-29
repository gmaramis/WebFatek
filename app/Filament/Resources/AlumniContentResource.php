<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniContentResource\Pages;
use App\Filament\Resources\AlumniContentResource\RelationManagers;
use App\Models\AlumniContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumniContentResource extends Resource
{
    protected static ?string $model = AlumniContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'Kemahasiswaan';
    
    protected static ?string $navigationLabel = 'Alumni';
    
    protected static ?string $modelLabel = 'Konten Alumni';
    
    protected static ?string $pluralModelLabel = 'Konten Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Konten')
                    ->schema([
                        Forms\Components\Select::make('section')
                            ->label('Section')
                            ->required()
                            ->options([
                                'hero' => 'Hero Section',
                                'statistik' => 'Statistik',
                                'testimonial' => 'Testimonial',
                                'galeri_kegiatan' => 'Galeri Kegiatan',
                                'jaringan_alumni' => 'Jaringan Alumni',
                                'kontribusi' => 'Kontribusi Alumni',
                            ])
                            ->placeholder('Pilih section')
                            ->helperText('Bagian halaman alumni yang akan dikelola'),
                        
                        Forms\Components\TextInput::make('key')
                            ->label('Key')
                            ->required()
                            ->placeholder('Contoh: judul, deskripsi, statistik_1')
                            ->helperText('Identifier unik untuk konten ini'),
                        
                        Forms\Components\Select::make('type')
                            ->label('Tipe Konten')
                            ->required()
                            ->options([
                                'text' => 'Teks',
                                'number' => 'Angka',
                                'image' => 'Gambar',
                                'html' => 'HTML',
                                'url' => 'URL',
                            ])
                            ->default('text')
                            ->placeholder('Pilih tipe konten'),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Urutan tampilan (angka kecil = tampil di atas)'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Konten')
                    ->schema([
                        Forms\Components\Textarea::make('value')
                            ->label('Nilai Konten')
                            ->required()
                            ->rows(4)
                            ->placeholder('Masukkan konten sesuai tipe yang dipilih')
                            ->helperText('Konten yang akan ditampilkan di website')
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image_url')
                            ->label('Gambar (Opsional)')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('450')
                            ->helperText('Upload gambar jika tipe konten adalah gambar')
                            ->maxSize(2048)
                            ->directory('alumni-content')
                            ->visible(fn ($get) => $get('type') === 'image')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Konten akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(2)
                            ->placeholder('Catatan tambahan tentang konten ini')
                            ->helperText('Catatan internal untuk admin')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')
                    ->label('Section')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'hero' => 'Hero Section',
                        'statistik' => 'Statistik',
                        'testimonial' => 'Testimonial',
                        'galeri_kegiatan' => 'Galeri Kegiatan',
                        'jaringan_alumni' => 'Jaringan Alumni',
                        'kontribusi' => 'Kontribusi Alumni',
                        default => ucwords(str_replace('_', ' ', $state)),
                    })
                    ->color(fn ($state) => match($state) {
                        'hero' => 'primary',
                        'statistik' => 'success',
                        'testimonial' => 'warning',
                        'galeri_kegiatan' => 'info',
                        'jaringan_alumni' => 'danger',
                        'kontribusi' => 'secondary',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('key')
                    ->label('Key')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('value')
                    ->label('Konten')
                    ->limit(50)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'text' => 'Teks',
                        'number' => 'Angka',
                        'image' => 'Gambar',
                        'html' => 'HTML',
                        'url' => 'URL',
                        default => ucwords($state),
                    })
                    ->color(fn ($state) => match($state) {
                        'text' => 'primary',
                        'number' => 'success',
                        'image' => 'warning',
                        'html' => 'info',
                        'url' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(),
                
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
                Tables\Filters\SelectFilter::make('section')
                    ->label('Section')
                    ->options([
                        'hero' => 'Hero Section',
                        'statistik' => 'Statistik',
                        'testimonial' => 'Testimonial',
                        'galeri_kegiatan' => 'Galeri Kegiatan',
                        'jaringan_alumni' => 'Jaringan Alumni',
                        'kontribusi' => 'Kontribusi Alumni',
                    ]),
                
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipe Konten')
                    ->options([
                        'text' => 'Teks',
                        'number' => 'Angka',
                        'image' => 'Gambar',
                        'html' => 'HTML',
                        'url' => 'URL',
                    ]),
                
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
            ->defaultSort('section', 'asc')
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
            'index' => Pages\ListAlumniContents::route('/'),
            'create' => Pages\CreateAlumniContent::route('/create'),
            'edit' => Pages\EditAlumniContent::route('/{record}/edit'),
        ];
    }
}
