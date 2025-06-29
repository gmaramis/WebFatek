<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GugusPenjaminanMutuResource\Pages;
use App\Filament\Resources\GugusPenjaminanMutuResource\RelationManagers;
use App\Models\GugusPenjaminanMutu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GugusPenjaminanMutuResource extends Resource
{
    protected static ?string $model = GugusPenjaminanMutu::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'Unit';
    
    protected static ?string $navigationLabel = 'GPM';
    
    protected static ?string $modelLabel = 'Gugus Penjaminan Mutu';
    
    protected static ?string $pluralModelLabel = 'Gugus Penjaminan Mutu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi GPM')
                    ->schema([
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
                        
                        Forms\Components\TextInput::make('nama_gpm')
                            ->label('Nama GPM')
                            ->required()
                            ->placeholder('Contoh: Dr. John Doe')
                            ->helperText('Nama lengkap Gugus Penjaminan Mutu'),
                        
                        Forms\Components\TextInput::make('gelar')
                            ->label('Gelar')
                            ->placeholder('Contoh: M.Kom')
                            ->helperText('Gelar akademik (opsional)'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang GPM ini...')
                            ->helperText('Deskripsi atau catatan tentang GPM'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('john.doe@unima.ac.id')
                            ->helperText('Email kontak GPM'),
                        
                        Forms\Components\TextInput::make('telepon')
                            ->label('Telepon')
                            ->tel()
                            ->placeholder('+62-812-3456-7890')
                            ->helperText('Nomor telepon kontak'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->label('Foto GPM')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('300')
                            ->imageResizeTargetHeight('300')
                            ->helperText('Upload foto GPM (format: JPG, PNG. Maksimal 2MB)')
                            ->maxSize(2048)
                            ->directory('gpm')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Data GPM akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->helperText('Urutan tampilan GPM (1 = pertama)'),
                    ])->columns(2),
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
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama_gpm) . '&color=ea580c&background=fef3c7'),
                
                Tables\Columns\TextColumn::make('program_studi_formatted')
                    ->label('Program Studi')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Teknik Informatika' => 'primary',
                        'Pendidikan Teknik Informatika & Komputer' => 'success',
                        'Teknik Sipil' => 'warning',
                        'Teknik Mesin' => 'danger',
                        'Teknik Elektro' => 'info',
                        'Arsitektur' => 'secondary',
                        'Pendidikan Teknik Bangunan' => 'gray',
                        'Pendidikan Kesejahteraan Keluarga' => 'purple',
                        default => 'secondary',
                    })
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama GPM')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->placeholder('Tidak ada'),
                
                Tables\Columns\TextColumn::make('telepon')
                    ->label('Telepon')
                    ->placeholder('Tidak ada'),
                
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
            'index' => Pages\ListGugusPenjaminanMutus::route('/'),
            'create' => Pages\CreateGugusPenjaminanMutu::route('/create'),
            'edit' => Pages\EditGugusPenjaminanMutu::route('/{record}/edit'),
        ];
    }
}
