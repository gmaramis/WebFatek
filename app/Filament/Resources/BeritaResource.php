<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita';

    public static function getPluralLabel(): string
    {
        return 'Berita';
    }

    public static function getLabel(): string
    {
        return 'Berita';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated()
                    ->unique(Berita::class, 'slug', ignoreRecord: true),
                
                Forms\Components\RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->required(),
                    
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gambar')
                    ->html()
                    ->formatStateUsing(fn ($state) => $state ? '<img src="' . asset('storage/' . $state) . '" width="40" height="40" style="object-fit: cover; border-radius: 4px;">' : ''),
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->date()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tanggal')
                    ->options(Berita::all()->pluck('tanggal', 'tanggal')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
