<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TracerStudyResource\Pages;
use App\Filament\Resources\TracerStudyResource\RelationManagers;
use App\Models\TracerStudy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class TracerStudyResource extends Resource
{
    protected static ?string $model = TracerStudy::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static ?string $navigationGroup = 'Kemahasiswaan';
    
    protected static ?string $navigationLabel = 'Tracer Study';
    
    protected static ?string $modelLabel = 'Tracer Study';
    
    protected static ?string $pluralModelLabel = 'Tracer Study';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),
                        
                        Forms\Components\Select::make('program_studi')
                            ->label('Program Studi')
                            ->required()
                            ->options([
                                'teknik-informatika' => 'Teknik Informatika',
                                'teknik-sipil' => 'Teknik Sipil',
                                'teknik-elektro' => 'Teknik Elektro',
                                'teknik-mesin' => 'Teknik Mesin',
                                'arsitektur' => 'Arsitektur',
                                'teknik-bangunan' => 'Teknik Bangunan',
                            ]),
                        
                        Forms\Components\TextInput::make('tahun_lulus')
                            ->label('Tahun Lulus')
                            ->required()
                            ->numeric()
                            ->minValue(2010)
                            ->maxValue(date('Y') + 1),
                        
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('telepon')
                            ->label('Telepon')
                            ->required()
                            ->maxLength(20),
                        
                        Forms\Components\TextInput::make('ipk')
                            ->label('IPK')
                            ->numeric()
                            ->step(0.01)
                            ->minValue(0)
                            ->maxValue(4),
                        
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(3)
                            ->maxLength(500),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Pekerjaan')
                    ->schema([
                        Forms\Components\Select::make('status_pekerjaan')
                            ->label('Status Pekerjaan')
                            ->required()
                            ->options([
                                'bekerja' => 'Bekerja',
                                'wirausaha' => 'Wirausaha',
                                'belum_bekerja' => 'Belum Bekerja',
                                'lanjut_studi' => 'Lanjut Studi',
                            ])
                            ->reactive(),
                        
                        Forms\Components\TextInput::make('waktu_tunggu_kerja')
                            ->label('Waktu Tunggu Kerja (Bulan)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(60)
                            ->visible(fn ($get) => in_array($get('status_pekerjaan'), ['bekerja', 'wirausaha'])),
                        
                        Forms\Components\TextInput::make('nama_perusahaan')
                            ->label('Nama Perusahaan/Instansi')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'bekerja'),
                        
                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->maxLength(255)
                            ->visible(fn ($get) => in_array($get('status_pekerjaan'), ['bekerja', 'wirausaha'])),
                        
                        Forms\Components\TextInput::make('gaji')
                            ->label('Gaji (Juta Rupiah)')
                            ->numeric()
                            ->step(0.1)
                            ->minValue(0)
                            ->maxValue(100)
                            ->visible(fn ($get) => in_array($get('status_pekerjaan'), ['bekerja', 'wirausaha'])),
                        
                        Forms\Components\Select::make('kesesuaian_bidang')
                            ->label('Kesesuaian Bidang')
                            ->options([
                                'sangat_sesuai' => 'Sangat Sesuai',
                                'sesuai' => 'Sesuai',
                                'kurang_sesuai' => 'Kurang Sesuai',
                                'tidak_sesuai' => 'Tidak Sesuai',
                            ])
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'bekerja'),
                        
                        Forms\Components\Select::make('jenis_perusahaan')
                            ->label('Jenis Perusahaan')
                            ->options([
                                'BUMN' => 'BUMN',
                                'Swasta Nasional' => 'Swasta Nasional',
                                'Swasta Asing' => 'Swasta Asing',
                                'Pemerintah' => 'Pemerintah',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'bekerja'),
                        
                        Forms\Components\TextInput::make('bidang_pekerjaan')
                            ->label('Bidang Pekerjaan')
                            ->maxLength(255)
                            ->visible(fn ($get) => in_array($get('status_pekerjaan'), ['bekerja', 'wirausaha'])),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Pencarian Kerja')
                    ->schema([
                        Forms\Components\Select::make('sumber_informasi_lowongan')
                            ->label('Sumber Informasi Lowongan')
                            ->options([
                                'Internet' => 'Internet',
                                'Koran' => 'Koran',
                                'Teman' => 'Teman',
                                'Keluarga' => 'Keluarga',
                                'Alumni' => 'Alumni',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                        
                        Forms\Components\Select::make('metode_mencari_kerja')
                            ->label('Metode Mencari Kerja')
                            ->options([
                                'Melamar Langsung' => 'Melamar Langsung',
                                'Melalui Internet' => 'Melalui Internet',
                                'Melalui Teman' => 'Melalui Teman',
                                'Melalui Keluarga' => 'Melalui Keluarga',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                        
                        Forms\Components\TextInput::make('lamanya_mencari_kerja')
                            ->label('Lamanya Mencari Kerja (Bulan)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(60)
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                        
                        Forms\Components\TextInput::make('jumlah_lamaran')
                            ->label('Jumlah Lamaran')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(1000)
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                        
                        Forms\Components\TextInput::make('jumlah_wawancara')
                            ->label('Jumlah Wawancara')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                        
                        Forms\Components\Textarea::make('alasan_belum_bekerja')
                            ->label('Alasan Belum Bekerja')
                            ->rows(3)
                            ->maxLength(500)
                            ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),
                    ])->columns(2)
                    ->visible(fn ($get) => $get('status_pekerjaan') === 'belum_bekerja'),

                Forms\Components\Section::make('Survey Kepuasan')
                    ->schema([
                        Forms\Components\Select::make('kepuasan_kurikulum')
                            ->label('Kepuasan Kurikulum')
                            ->options([
                                1 => '1 - Sangat Tidak Puas',
                                2 => '2 - Tidak Puas',
                                3 => '3 - Cukup',
                                4 => '4 - Puas',
                                5 => '5 - Sangat Puas',
                            ]),
                        
                        Forms\Components\Select::make('relevansi_ilmu')
                            ->label('Relevansi Ilmu')
                            ->options([
                                1 => '1 - Tidak Relevan',
                                2 => '2 - Kurang Relevan',
                                3 => '3 - Cukup',
                                4 => '4 - Relevan',
                                5 => '5 - Sangat Relevan',
                            ]),
                        
                        Forms\Components\Textarea::make('kompetensi_yang_dibutuhkan')
                            ->label('Kompetensi yang Dibutuhkan')
                            ->rows(3)
                            ->maxLength(500),
                        
                        Forms\Components\Textarea::make('kompetensi_yang_dimiliki')
                            ->label('Kompetensi yang Dimiliki')
                            ->rows(3)
                            ->maxLength(500),
                        
                        Forms\Components\Textarea::make('rencana_kedepan')
                            ->label('Rencana Kedepan')
                            ->rows(3)
                            ->maxLength(500),
                        
                        Forms\Components\Textarea::make('saran_pengembangan')
                            ->label('Saran Pengembangan')
                            ->rows(4)
                            ->maxLength(1000),
                        
                        Forms\Components\Textarea::make('saran_untuk_almamater')
                            ->label('Saran untuk Almamater')
                            ->rows(4)
                            ->maxLength(1000),
                    ])->columns(2),

                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'aktif' => 'Aktif',
                                'nonaktif' => 'Nonaktif',
                            ])
                            ->default('aktif')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('program_studi')
                    ->label('Program Studi')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ucwords(str_replace('-', ' ', $state)))
                    ->color(fn ($state) => match ($state) {
                        'teknik-informatika' => 'primary',
                        'teknik-sipil' => 'success',
                        'teknik-elektro' => 'warning',
                        'teknik-mesin' => 'danger',
                        'arsitektur' => 'secondary',
                        'teknik-bangunan' => 'info',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('status_pekerjaan')
                    ->label('Status Pekerjaan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'bekerja' => 'Bekerja',
                        'wirausaha' => 'Wirausaha',
                        'belum_bekerja' => 'Belum Bekerja',
                        'lanjut_studi' => 'Lanjut Studi',
                    })
                    ->color(fn ($state) => match ($state) {
                        'bekerja' => 'success',
                        'wirausaha' => 'warning',
                        'belum_bekerja' => 'danger',
                        'lanjut_studi' => 'info',
                    }),
                
                Tables\Columns\TextColumn::make('gaji_formatted')
                    ->label('Gaji')
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('waktu_tunggu_formatted')
                    ->label('Waktu Tunggu')
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('kepuasan_kurikulum')
                    ->label('Kepuasan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? $state . '/5' : '-')
                    ->color(fn ($state) => match ($state) {
                        5 => 'success',
                        4 => 'success',
                        3 => 'warning',
                        2 => 'danger',
                        1 => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state === 'aktif' ? 'Aktif' : 'Nonaktif')
                    ->color(fn ($state) => $state === 'aktif' ? 'success' : 'danger'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('program_studi')
                    ->label('Program Studi')
                    ->options([
                        'teknik-informatika' => 'Teknik Informatika',
                        'teknik-sipil' => 'Teknik Sipil',
                        'teknik-elektro' => 'Teknik Elektro',
                        'teknik-mesin' => 'Teknik Mesin',
                        'arsitektur' => 'Arsitektur',
                        'teknik-bangunan' => 'Teknik Bangunan',
                    ]),
                
                Tables\Filters\SelectFilter::make('status_pekerjaan')
                    ->label('Status Pekerjaan')
                    ->options([
                        'bekerja' => 'Bekerja',
                        'wirausaha' => 'Wirausaha',
                        'belum_bekerja' => 'Belum Bekerja',
                        'lanjut_studi' => 'Lanjut Studi',
                    ]),
                
                Tables\Filters\SelectFilter::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->options(function () {
                        $years = TracerStudy::distinct()->pluck('tahun_lulus')->sort()->reverse();
                        return $years->mapWithKeys(fn ($year) => [$year => $year]);
                    }),
                
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye')
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
                Tables\Actions\Action::make('export_pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(function (TracerStudy $record) {
                        return response()->streamDownload(function () use ($record) {
                            $pdf = Pdf::loadView('pdf.tracer-study-detail', ['tracerStudy' => $record]);
                            echo $pdf->output();
                        }, 'tracer-study-' . $record->nim . '.pdf');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('export_pdf_bulk')
                        ->label('Export PDF (Bulk)')
                        ->icon('heroicon-o-document-arrow-down')
                        ->color('success')
                        ->action(function ($records) {
                            $pdf = Pdf::loadView('pdf.tracer-study-bulk', ['records' => $records]);
                            return response()->streamDownload(function () use ($pdf) {
                                echo $pdf->output();
                            }, 'tracer-study-bulk-' . date('Y-m-d') . '.pdf');
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped();
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
            'index' => Pages\ListTracerStudies::route('/'),
            'create' => Pages\CreateTracerStudy::route('/create'),
            'view' => Pages\ViewTracerStudy::route('/{record}'),
            'edit' => Pages\EditTracerStudy::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 0 ? 'success' : 'danger';
    }
}
