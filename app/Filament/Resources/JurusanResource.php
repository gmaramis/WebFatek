<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanResource\Pages;
use App\Filament\Resources\JurusanResource\RelationManagers;
use App\Models\Jurusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurusanResource extends Resource
{
    protected static ?string $model = Jurusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationLabel = 'Jurusan';

    protected static ?int $navigationSort = 5;

    protected static ?string $modelLabel = 'Jurusan';

    protected static ?string $pluralModelLabel = 'Jurusan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('visi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('misi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tujuan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar Jurusan')
                    ->image()
                    ->disk('public')
                    ->directory('jurusans')
                    ->maxSize(5120)   // 5MB
                    ->required(),
                Forms\Components\TextInput::make('kepala_jurusan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip_kepala')
                    ->maxLength(255),
                Forms\Components\TextInput::make('akreditasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenjang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('durasi_studi')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('prospek_karir')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->square() // biar thumbnail kotak, bisa diganti ->circular()
                    ->size(80),

                Tables\Columns\TextColumn::make('kepala_jurusan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip_kepala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('akreditasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenjang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('durasi_studi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListJurusans::route('/'),
            'create' => Pages\CreateJurusan::route('/create'),
            'edit' => Pages\EditJurusan::route('/{record}/edit'),
        ];
    }
}