<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MagangKknResource\Pages;
use App\Filament\Resources\MagangKknResource\RelationManagers;
use App\Models\MagangKkn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MagangKknResource extends Resource
{
    protected static ?string $model = MagangKkn::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?string $navigationLabel = 'Magang & KKN';
    
    protected static ?string $modelLabel = 'Magang & KKN';
    
    protected static ?string $pluralModelLabel = 'Magang & KKN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\Select::make('jenis')
                            ->label('Jenis Program')
                            ->required()
                            ->options([
                                'magang' => 'Program Magang',
                                'kkn' => 'Program KKN',
                            ])
                            ->default('magang')
                            ->placeholder('Pilih jenis program'),
                        
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Program')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Program Magang Industri 2025'),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi Program')
                            ->required()
                            ->rows(4)
                            ->placeholder('Tulis deskripsi lengkap tentang program ini...')
                            ->helperText('Deskripsi yang akan ditampilkan di halaman website'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Manfaat Program')
                    ->schema([
                        Forms\Components\Textarea::make('manfaat')
                            ->label('Manfaat Program')
                            ->rows(6)
                            ->placeholder('Tulis manfaat program dalam format list. Contoh:
• Menerapkan ilmu yang telah dipelajari dalam situasi nyata
• Mengembangkan keterampilan profesional
• Membangun jaringan yang bermanfaat untuk karier
• Memahami dinamika dunia kerja')
                            ->helperText('Gunakan bullet points (•) untuk membuat list manfaat')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Statistik Program')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('statistik_1_label')
                                    ->label('Label Statistik 1')
                                    ->placeholder('Contoh: Mahasiswa Magang'),
                                
                                Forms\Components\TextInput::make('statistik_1_nilai')
                                    ->label('Nilai Statistik 1')
                                    ->placeholder('Contoh: 500+'),
                                
                                Forms\Components\TextInput::make('statistik_2_label')
                                    ->label('Label Statistik 2')
                                    ->placeholder('Contoh: Perusahaan Mitra'),
                                
                                Forms\Components\TextInput::make('statistik_2_nilai')
                                    ->label('Nilai Statistik 2')
                                    ->placeholder('Contoh: 50+'),
                                
                                Forms\Components\TextInput::make('statistik_3_label')
                                    ->label('Label Statistik 3')
                                    ->placeholder('Contoh: Tingkat Penyerapan'),
                                
                                Forms\Components\TextInput::make('statistik_3_nilai')
                                    ->label('Nilai Statistik 3')
                                    ->placeholder('Contoh: 95%'),
                                
                                Forms\Components\TextInput::make('statistik_4_label')
                                    ->label('Label Statistik 4')
                                    ->placeholder('Contoh: Bulan Program'),
                                
                                Forms\Components\TextInput::make('statistik_4_nilai')
                                    ->label('Nilai Statistik 4')
                                    ->placeholder('Contoh: 12'),
                            ]),
                    ]),
                
                Forms\Components\Section::make('Bidang Program')
                    ->schema([
                        Forms\Components\Textarea::make('bidang_program')
                            ->label('Bidang Program')
                            ->rows(4)
                            ->placeholder('Tulis bidang-bidang program yang tersedia. Contoh:
• Industri: Magang di perusahaan manufaktur, konstruksi, dan teknologi
• Pemerintahan: Pengalaman kerja di instansi pemerintah dan BUMN
• Masyarakat: Pengabdian langsung kepada masyarakat desa
• Lingkungan: Program pelestarian dan pemberdayaan lingkungan')
                            ->helperText('Gunakan bullet points (•) untuk membuat list bidang program')
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->helperText('Program akan ditampilkan di website jika diaktifkan')
                            ->default(true),
                        
                        Forms\Components\TextInput::make('urutan')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(1)
                            ->helperText('Urutan tampilan program (1 = pertama)'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'magang' => 'primary',
                        'kkn' => 'success',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'magang' => 'Program Magang',
                        'kkn' => 'Program KKN',
                    }),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(100)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->numeric(),
                
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
                Tables\Filters\SelectFilter::make('jenis')
                    ->options([
                        'magang' => 'Program Magang',
                        'kkn' => 'Program KKN',
                    ])
                    ->label('Jenis Program'),
                
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
            'index' => Pages\ListMagangKkns::route('/'),
            'create' => Pages\CreateMagangKkn::route('/create'),
            'edit' => Pages\EditMagangKkn::route('/{record}/edit'),
        ];
    }
}
