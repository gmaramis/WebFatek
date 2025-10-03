<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use App\Models\StrukturOrganisasi;
use Filament\Resources\Pages\EditRecord;

class EditStrukturOrganisasi extends EditRecord
{
    protected static string $resource = StrukturOrganisasiResource::class;
    protected static ?string $title   = 'Struktur Organisasi';

    /** Ambil/siapkan SELALU record pertama (single record) */
    public function mount($record = null): void
    {
        $record = StrukturOrganisasi::query()->first()
            ?? StrukturOrganisasi::create([
                'title' => 'Struktur Organisasi',
            ]);

        $this->record = $record;
        parent::mount($record->getKey());
    }

    /** Hilangkan tombol aksi header (create/delete) */
    protected function getHeaderActions(): array
    {
        return [];
    }
}
