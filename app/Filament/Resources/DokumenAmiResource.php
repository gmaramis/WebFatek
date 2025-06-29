<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenAmiResource\Pages;
use App\Filament\Resources\DokumenAmiResource\RelationManagers;
use App\Models\DokumenAmi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DokumenAmiResource extends Resource
{
    protected static ?string $model = DokumenAmi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Unit';
    
    protected static ?string $navigationLabel = 'Dokumen AMI';
    
    protected static ?string $modelLabel = 'Dokumen AMI';
    
    protected static ?string $pluralModelLabel = 'Dokumen AMI';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dokumen')
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
                        
                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->required()
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(date('Y') + 1)
                            ->placeholder('Contoh: 2024'),
                        
                        Forms\Components\TextInput::make('judul_dokumen')
                            ->label('Judul Dokumen')
                            ->required()
                            ->placeholder('Contoh: Laporan Audit Mutu Internal 2024')
                            ->helperText('Judul dokumen AMI'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang dokumen ini...')
                            ->helperText('Deskripsi atau catatan tentang dokumen'),
                    ])->columns(2),
                
                Forms\Components\Section::make('File Dokumen')
                    ->schema([
                        Forms\Components\FileUpload::make('file_dokumen')
                            ->label('File Dokumen')
                            ->helperText('Upload file dokumen AMI (format: PDF, DOC, DOCX. Maksimal 10MB)')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(10240) // 10MB
                            ->directory('dokumen-ami')
                            ->preserveFilenames()
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('link_eksternal')
                            ->label('Link Eksternal (Opsional)')
                            ->url()
                            ->placeholder('https://example.com/dokumen-ami.pdf')
                            ->helperText('Link ke dokumen eksternal jika tidak upload file'),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Dokumen akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->helperText('Urutan tampilan dokumen (1 = pertama)'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('judul_dokumen')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('file_dokumen')
                    ->label('File')
                    ->placeholder('Link Eksternal')
                    ->formatStateUsing(fn ($state) => $state ? '📄 File' : '🔗 Link'),
                
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
                
                Tables\Filters\SelectFilter::make('tahun')
                    ->options(function () {
                        $years = [];
                        for ($i = date('Y'); $i >= 2020; $i--) {
                            $years[$i] = $i;
                        }
                        return $years;
                    })
                    ->label('Tahun'),
                
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
            ->defaultSort('tahun', 'desc')
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
            'index' => Pages\ListDokumenAmis::route('/'),
            'create' => Pages\CreateDokumenAmi::route('/create'),
            'edit' => Pages\EditDokumenAmi::route('/{record}/edit'),
        ];
    }
}
