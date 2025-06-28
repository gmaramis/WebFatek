<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Model;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Pengumuman';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan judul pengumuman')
                    ->label('Judul Pengumuman'),

                RichEditor::make('isi')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3',
                        'h4',
                    ])
                    ->placeholder('Tulis isi pengumuman di sini...')
                    ->label('Isi Pengumuman'),

                DateTimePicker::make('tanggal_posting')
                    ->required()
                    ->default(now())
                    ->label('Tanggal Posting'),

                DateTimePicker::make('tanggal_berakhir')
                    ->nullable()
                    ->label('Tanggal Berakhir')
                    ->helperText('Kosongkan jika pengumuman tidak memiliki masa berlaku'),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Dipublikasi',
                        'archived' => 'Diarsipkan',
                    ])
                    ->default('draft')
                    ->required()
                    ->label('Status'),

                Select::make('kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'umum' => 'Umum',
                        'penting' => 'Penting',
                    ])
                    ->default('umum')
                    ->required()
                    ->label('Kategori'),

                FileUpload::make('file_lampiran')
                    ->label('File Lampiran')
                    ->helperText('Upload file lampiran (PDF, DOC, DOCX, JPG, PNG)')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'image/jpeg',
                        'image/png'
                    ])
                    ->maxSize(5120) // 5MB
                    ->directory('pengumuman')
                    ->preserveFilenames()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable()
                    ->limit(50)
                    ->label('Judul'),

                TextColumn::make('kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'akademik' => 'info',
                        'kemahasiswaan' => 'success',
                        'umum' => 'gray',
                        'penting' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'umum' => 'Umum',
                        'penting' => 'Penting',
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'published' => 'Dipublikasi',
                        'archived' => 'Diarsipkan',
                    }),

                TextColumn::make('tanggal_posting')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Tanggal Posting'),

                TextColumn::make('tanggal_berakhir')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Tanggal Berakhir')
                    ->placeholder('Tidak ada'),

                TextColumn::make('user.name')
                    ->label('Dibuat Oleh')
                    ->placeholder('Sistem'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Dibuat Pada'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Dipublikasi',
                        'archived' => 'Diarsipkan',
                    ])
                    ->label('Status'),

                SelectFilter::make('kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'umum' => 'Umum',
                        'penting' => 'Penting',
                    ])
                    ->label('Kategori'),

                Filter::make('tanggal_posting')
                    ->form([
                        DateTimePicker::make('tanggal_dari')
                            ->label('Dari Tanggal'),
                        DateTimePicker::make('tanggal_sampai')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['tanggal_dari'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_posting', '>=', $date),
                            )
                            ->when(
                                $data['tanggal_sampai'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_posting', '<=', $date),
                            );
                    })
                    ->label('Filter Tanggal'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPengumumans::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
} 