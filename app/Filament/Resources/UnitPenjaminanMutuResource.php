<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitPenjaminanMutuResource\Pages;
use App\Filament\Resources\UnitPenjaminanMutuResource\RelationManagers;
use App\Models\UnitPenjaminanMutu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitPenjaminanMutuResource extends Resource
{
    protected static ?string $model = UnitPenjaminanMutu::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    
    protected static ?string $navigationGroup = 'Unit';
    
    protected static ?string $navigationLabel = 'Ketua UPM';
    
    protected static ?string $modelLabel = 'Ketua Unit Penjaminan Mutu';
    
    protected static ?string $pluralModelLabel = 'Ketua Unit Penjaminan Mutu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Ketua UPM')
                    ->schema([
                        Forms\Components\TextInput::make('nama_ketua')
                            ->label('Nama Ketua')
                            ->required()
                            ->placeholder('Contoh: Prof. Dr. Meytij Jeanne Rampe')
                            ->helperText('Nama lengkap ketua UPM'),
                        
                        Forms\Components\TextInput::make('gelar')
                            ->label('Gelar')
                            ->placeholder('Contoh: M.Si.')
                            ->helperText('Gelar akademik (opsional)'),
                        
                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->placeholder('Contoh: Ketua Unit Penjaminan Mutu (UPM) Fatek')
                            ->helperText('Jabatan lengkap di UPM'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi/Quote')
                            ->rows(3)
                            ->placeholder('Contoh: Bersama membangun budaya mutu di lingkungan Fakultas Teknik UNIMA...')
                            ->helperText('Deskripsi atau quote ketua UPM'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('upm.fatek@unima.ac.id')
                            ->helperText('Email kontak UPM'),
                        
                        Forms\Components\TextInput::make('telepon')
                            ->label('Telepon')
                            ->tel()
                            ->placeholder('+62-431-123456 ext. 123')
                            ->helperText('Nomor telepon kontak'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto Ketua UPM')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('300')
                            ->helperText('Upload foto ketua UPM (format: JPG, PNG. Maksimal 2MB)')
                            ->maxSize(2048)
                            ->directory('upm')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Data ketua UPM akan ditampilkan di website jika diaktifkan')
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
                    ->size(50)
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama_ketua) . '&color=ea580c&background=fef3c7'),
                
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->placeholder('Tidak ada'),
                
                Tables\Columns\TextColumn::make('telepon')
                    ->label('Telepon')
                    ->placeholder('Tidak ada'),
                
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
            'index' => Pages\ListUnitPenjaminanMutus::route('/'),
            'create' => Pages\CreateUnitPenjaminanMutu::route('/create'),
            'edit' => Pages\EditUnitPenjaminanMutu::route('/{record}/edit'),
        ];
    }
}
