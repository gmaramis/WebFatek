<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenDownloadResource\Pages;
use App\Filament\Resources\DokumenDownloadResource\RelationManagers;
use App\Models\DokumenDownload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;

class DokumenDownloadResource extends Resource
{
    protected static ?string $model = DokumenDownload::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    
    protected static ?string $navigationLabel = 'Dokumen Download';
    
    protected static ?string $modelLabel = 'Dokumen Download';
    
    protected static ?string $pluralModelLabel = 'Dokumen Download';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Dokumen')
                    ->required()
                    ->maxLength(255),
                    
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->maxLength(1000),
                    
                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'administrasi' => 'Administrasi',
                        'penelitian' => 'Penelitian',
                        'pengabdian' => 'Pengabdian',
                        'kerjasama' => 'Kerjasama',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),
                    
                FileUpload::make('file_path')
                    ->label('File Dokumen')
                    ->directory('dokumen-download')
                    ->acceptedFileTypes(['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'zip', 'rar'])
                    ->maxSize(10240) // 10MB
                    ->required()
                    ->helperText('Format yang didukung: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP, RAR. Maksimal 10MB.')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $set('file_name', basename($state));
                        }
                    }),
                    
                TextInput::make('file_name')
                    ->label('Nama File')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Nama file yang akan ditampilkan ke pengguna'),
                    
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                    
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'akademik' => 'success',
                        'administrasi' => 'info',
                        'penelitian' => 'warning',
                        'pengabdian' => 'primary',
                        'kerjasama' => 'danger',
                        'lainnya' => 'gray',
                    }),
                    
                TextColumn::make('file_name')
                    ->label('Nama File')
                    ->searchable()
                    ->limit(30),
                    
                TextColumn::make('file_type')
                    ->label('Tipe File')
                    ->badge()
                    ->color('gray')
                    ->alignCenter(),
                    
                TextColumn::make('formatted_file_size')
                    ->label('Ukuran File')
                    ->alignCenter()
                    ->sortable(query: fn (Builder $query, string $direction): Builder => $query->orderBy('file_size', $direction)),
                    
                TextColumn::make('download_count')
                    ->label('Download')
                    ->alignCenter()
                    ->sortable(),
                    
                ToggleColumn::make('is_active')
                    ->label('Status')
                    ->alignCenter(),
                    
                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'administrasi' => 'Administrasi',
                        'penelitian' => 'Penelitian',
                        'pengabdian' => 'Pengabdian',
                        'kerjasama' => 'Kerjasama',
                        'lainnya' => 'Lainnya',
                    ]),
                    
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (DokumenDownload $record): string => $record->file_url)
                    ->openUrlInNewTab()
                    ->color('success'),
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
            'index' => Pages\ListDokumenDownloads::route('/'),
            'create' => Pages\CreateDokumenDownload::route('/create'),
            'edit' => Pages\EditDokumenDownload::route('/{record}/edit'),
        ];
    }
}
