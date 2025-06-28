<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KebijakanResource\Pages;
use App\Filament\Resources\KebijakanResource\RelationManagers;
use App\Models\Kebijakan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KebijakanResource extends Resource
{
    protected static ?string $model = Kebijakan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Profil';
    
    protected static ?string $navigationLabel = 'Kebijakan';
    
    protected static ?string $modelLabel = 'Kebijakan';
    
    protected static ?string $pluralModelLabel = 'Kebijakan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Kebijakan')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Kebijakan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Kebijakan Akademik Fakultas Teknik'),
                        
                        Forms\Components\Select::make('kategori')
                            ->label('Kategori')
                            ->required()
                            ->options([
                                'akademik' => 'Akademik',
                                'kemahasiswaan' => 'Kemahasiswaan',
                                'kepegawaian' => 'Kepegawaian',
                                'keuangan' => 'Keuangan',
                                'umum' => 'Umum',
                            ])
                            ->placeholder('Pilih kategori kebijakan'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang kebijakan ini...')
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Forms\Components\Section::make('Konten Kebijakan')
                    ->schema([
                        Forms\Components\Textarea::make('isi')
                            ->label('Isi Kebijakan')
                            ->required()
                            ->rows(15)
                            ->placeholder('Tulis isi kebijakan lengkap di sini. Anda dapat menggunakan format HTML sederhana seperti:
                            
<h3>Judul Bagian</h3>
<p>Paragraf teks...</p>
<ul>
    <li>Item list 1</li>
    <li>Item list 2</li>
</ul>')
                            ->helperText('Gunakan format HTML sederhana untuk formatting. Contoh: <strong>teks tebal</strong>, <em>teks miring</em>, <h3>judul</h3>, <ul><li>list item</li></ul>')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\FileUpload::make('file_dokumen')
                            ->label('File Dokumen (Opsional)')
                            ->helperText('Upload file PDF atau dokumen pendukung jika ada')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(5120), // 5MB
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Kebijakan akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\BadgeColumn::make('kategori')
                    ->label('Kategori')
                    ->colors([
                        'primary' => 'akademik',
                        'success' => 'kemahasiswaan',
                        'warning' => 'kepegawaian',
                        'danger' => 'keuangan',
                        'secondary' => 'umum',
                    ]),
                
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
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'akademik' => 'Akademik',
                        'kemahasiswaan' => 'Kemahasiswaan',
                        'kepegawaian' => 'Kepegawaian',
                        'keuangan' => 'Keuangan',
                        'umum' => 'Umum',
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
            ->defaultSort('updated_at', 'desc');
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
            'index' => Pages\ListKebijakans::route('/'),
            'create' => Pages\CreateKebijakan::route('/create'),
            'edit' => Pages\EditKebijakan::route('/{record}/edit'),
        ];
    }
}
