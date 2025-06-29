<?php

namespace App\Filament\Resources;

use App\Filament\Resources\P3rpmContentResource\Pages;
use App\Filament\Resources\P3rpmContentResource\RelationManagers;
use App\Models\P3rpmContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class P3rpmContentResource extends Resource
{
    protected static ?string $model = P3rpmContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'Unit';
    
    protected static ?string $navigationLabel = 'P3RPM Content';
    
    protected static ?string $modelLabel = 'Konten P3RPM';
    
    protected static ?string $pluralModelLabel = 'Konten P3RPM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\Select::make('section')
                            ->label('Bagian Halaman')
                            ->required()
                            ->options([
                                'hero' => 'Hero Section',
                                'deskripsi' => 'Deskripsi P3RPM',
                                'visi' => 'Visi',
                                'misi' => 'Misi',
                                'program' => 'Program Unggulan',
                                'skema' => 'Skema Pendanaan',
                                'roadmap' => 'Roadmap Riset',
                                'kontak' => 'Informasi Kontak',
                            ])
                            ->placeholder('Pilih bagian halaman')
                            ->helperText('Pilih bagian halaman yang akan dikelola'),
                        
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->maxLength(255)
                            ->placeholder('Contoh: Pusat Penyusunan Proposal Riset')
                            ->helperText('Judul yang akan ditampilkan (opsional)'),
                        
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Sub Judul')
                            ->maxLength(255)
                            ->placeholder('Contoh: Wadah Kolaborasi Riset dan Pengabdian')
                            ->helperText('Sub judul atau tagline (opsional)'),
                    ])->columns(3),

                Forms\Components\Section::make('Konten')
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->label('Konten Utama')
                            ->required()
                            ->rows(6)
                            ->placeholder('Tulis konten utama di sini...')
                            ->helperText('Konten utama yang akan ditampilkan di halaman'),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Tambahan')
                            ->rows(4)
                            ->placeholder('Deskripsi tambahan jika diperlukan...')
                            ->helperText('Deskripsi tambahan (opsional)'),
                    ])->columns(1),

                Forms\Components\Section::make('Tampilan')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('450')
                            ->helperText('Upload gambar untuk section ini (opsional)')
                            ->maxSize(2048)
                            ->directory('p3rpm-content'),
                        
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (Heroicon)')
                            ->placeholder('Contoh: heroicon-o-academic-cap')
                            ->helperText('Nama icon Heroicon (opsional)'),
                        
                        Forms\Components\Select::make('color')
                            ->label('Warna')
                            ->options([
                                'blue' => 'Biru',
                                'green' => 'Hijau',
                                'yellow' => 'Kuning',
                                'red' => 'Merah',
                                'purple' => 'Ungu',
                                'indigo' => 'Indigo',
                                'cyan' => 'Cyan',
                                'orange' => 'Orange',
                                'pink' => 'Pink',
                                'gray' => 'Abu-abu',
                            ])
                            ->placeholder('Pilih warna')
                            ->helperText('Warna untuk section ini'),
                    ])->columns(3),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->helperText('Urutan tampilan (1 = pertama)'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Konten akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')
                    ->label('Bagian')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'hero' => 'Hero Section',
                        'deskripsi' => 'Deskripsi P3RPM',
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'program' => 'Program Unggulan',
                        'skema' => 'Skema Pendanaan',
                        'roadmap' => 'Roadmap Riset',
                        'kontak' => 'Informasi Kontak',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'hero' => 'primary',
                        'deskripsi' => 'info',
                        'visi' => 'success',
                        'misi' => 'warning',
                        'program' => 'purple',
                        'skema' => 'blue',
                        'roadmap' => 'green',
                        'kontak' => 'secondary',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->placeholder('Tidak ada judul'),

                Tables\Columns\TextColumn::make('content')
                    ->label('Konten')
                    ->limit(50)
                    ->searchable()
                    ->placeholder('Tidak ada konten'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('color')
                    ->label('Warna')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->placeholder('Default'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('section')
                    ->label('Bagian')
                    ->options([
                        'hero' => 'Hero Section',
                        'deskripsi' => 'Deskripsi P3RPM',
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'program' => 'Program Unggulan',
                        'skema' => 'Skema Pendanaan',
                        'roadmap' => 'Roadmap Riset',
                        'kontak' => 'Informasi Kontak',
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
            ->defaultSort('order', 'asc')
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
            'index' => Pages\ListP3rpmContents::route('/'),
            'create' => Pages\CreateP3rpmContent::route('/create'),
            'edit' => Pages\EditP3rpmContent::route('/{record}/edit'),
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
