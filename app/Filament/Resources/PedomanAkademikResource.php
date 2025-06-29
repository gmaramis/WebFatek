<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PedomanAkademikResource\Pages;
use App\Models\PedomanAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PedomanAkademikResource extends Resource
{
    protected static ?string $model = PedomanAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Pedoman Akademik';

    protected static ?string $modelLabel = 'Pedoman Akademik';

    protected static ?string $pluralModelLabel = 'Pedoman Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Pedoman')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Pedoman Akademik Fakultas Teknik UNIMA 2025'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(4)
                            ->placeholder('Deskripsi singkat tentang pedoman akademik ini'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                            ])
                            ->default('aktif')
                            ->required(),

                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->minValue(1)
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi File')
                    ->schema([
                        Forms\Components\TextInput::make('file_url')
                            ->label('URL Google Drive')
                            ->url()
                            ->placeholder('https://drive.google.com/file/d/...')
                            ->helperText('Masukkan link Google Drive untuk file pedoman akademik'),

                        Forms\Components\TextInput::make('file_name')
                            ->label('Nama File')
                            ->placeholder('Contoh: Pedoman_Akademik_Fatek_2025.pdf'),

                        Forms\Components\TextInput::make('file_size')
                            ->label('Ukuran File')
                            ->placeholder('Contoh: 2.5 MB'),

                        Forms\Components\TextInput::make('jumlah_halaman')
                            ->label('Jumlah Halaman')
                            ->numeric()
                            ->minValue(1)
                            ->placeholder('Contoh: 150'),

                        Forms\Components\Select::make('format_file')
                            ->label('Format File')
                            ->options([
                                'PDF' => 'PDF',
                                'DOC' => 'DOC',
                                'DOCX' => 'DOCX',
                                'XLS' => 'XLS',
                                'XLSX' => 'XLSX',
                                'PPT' => 'PPT',
                                'PPTX' => 'PPTX',
                            ])
                            ->default('PDF')
                            ->required(),

                        Forms\Components\DatePicker::make('tanggal_update')
                            ->label('Tanggal Update')
                            ->default(now()),
                    ])->columns(2),

                Forms\Components\Section::make('Catatan Tambahan')
                    ->schema([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->rows(3)
                            ->placeholder('Catatan tambahan atau informasi khusus tentang pedoman ini'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('format_file')
                    ->label('Format')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('file_size')
                    ->label('Ukuran')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah_halaman')
                    ->label('Halaman')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_update')
                    ->label('Update Terakhir')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ]),

                Tables\Filters\SelectFilter::make('format_file')
                    ->label('Format File')
                    ->options([
                        'PDF' => 'PDF',
                        'DOC' => 'DOC',
                        'DOCX' => 'DOCX',
                        'XLS' => 'XLS',
                        'XLSX' => 'XLSX',
                        'PPT' => 'PPT',
                        'PPTX' => 'PPTX',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
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
            'index' => Pages\ListPedomanAkademiks::route('/'),
            'create' => Pages\CreatePedomanAkademik::route('/create'),
            'edit' => Pages\EditPedomanAkademik::route('/{record}/edit'),
        ];
    }
} 