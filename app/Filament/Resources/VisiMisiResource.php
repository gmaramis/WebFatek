<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationLabel = 'Visi Misi';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Halaman')
                            ->placeholder('Contoh: Visi, Misi dan Tujuan Fakultas Teknik UNIMA')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Judul ini akan ditampilkan di halaman website'),
                    ]),
                
                Forms\Components\Section::make('Konten Visi Misi')
                    ->schema([
                        Forms\Components\Textarea::make('visi')
                            ->label('Visi')
                            ->placeholder('Tulis visi fakultas di sini...')
                            ->required()
                            ->rows(4)
                            ->helperText('Tulis visi fakultas dalam satu paragraf. Gunakan <strong>text</strong> untuk bold dan <em>text</em> untuk italic.')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('misi')
                            ->label('Misi')
                            ->placeholder('Tulis misi fakultas di sini...')
                            ->required()
                            ->rows(6)
                            ->helperText('Tulis misi fakultas. Gunakan <ul><li>Poin 1</li><li>Poin 2</li></ul> untuk bullet list.')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('tujuan')
                            ->label('Tujuan')
                            ->placeholder('Tulis tujuan fakultas di sini...')
                            ->required()
                            ->rows(6)
                            ->helperText('Tulis tujuan fakultas. Gunakan <ul><li>Poin 1</li><li>Poin 2</li></ul> untuk bullet list.')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('sasaran')
                            ->label('Sasaran')
                            ->placeholder('Tulis sasaran fakultas di sini...')
                            ->required()
                            ->rows(6)
                            ->helperText('Tulis sasaran fakultas. Gunakan <ul><li>Poin 1</li><li>Poin 2</li></ul> untuk bullet list.')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktifkan Halaman')
                            ->helperText('Aktifkan untuk menampilkan di website, nonaktifkan untuk menyembunyikan.')
                            ->default(true)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
