<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Konten Website';

    protected static ?string $navigationLabel = 'Slider Halaman Depan';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Slider')
                    ->description('Maksimal 3 slider yang dapat ditampilkan di halaman depan')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Slider')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: FAKULTAS TEKNIK UNIMA'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->maxLength(500)
                            ->rows(3)
                            ->placeholder('Deskripsi singkat tentang slider ini'),

                        Forms\Components\TextInput::make('link')
                            ->label('Link (Opsional)')
                            ->url()
                            ->placeholder('https://example.com')
                            ->helperText('Link yang akan dibuka ketika slider diklik'),

                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Slider')
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->required()
                            ->helperText('Ukuran yang disarankan: 1920x1080px (16:9). Minimal 1200x675px. Maksimal 5MB.')
                            ->rules([
                                'required',
                                'image',
                                'mimes:jpeg,png,jpg,webp',
                                'max:5120', // 5MB
                                'dimensions:min_width=1200,min_height=675'
                            ])
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    // Auto-resize jika gambar terlalu besar
                                    $path = Storage::disk('public')->path($state);
                                    $image = Image::make($path);
                                    
                                    // Resize jika lebih besar dari 1920x1080
                                    if ($image->width() > 1920 || $image->height() > 1080) {
                                        $image->resize(1920, 1080, function ($constraint) {
                                            $constraint->aspectRatio();
                                            $constraint->upsize();
                                        });
                                        $image->save($path);
                                    }
                                }
                            }),

                        Forms\Components\Select::make('urutan')
                            ->label('Urutan')
                            ->options([
                                1 => 'Pertama',
                                2 => 'Kedua', 
                                3 => 'Ketiga'
                            ])
                            ->required()
                            ->default(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Slider akan ditampilkan di halaman depan jika aktif'),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_base64')
                    ->label('Gambar')
                    ->size(100)
                    ->circular(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = Slider::count();
        return $count . '/3';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = Slider::count();
        if ($count >= 3) {
            return 'danger';
        } elseif ($count >= 2) {
            return 'warning';
        }
        return 'success';
    }
}
