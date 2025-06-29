<?php

namespace App\Filament\Resources\P3rpmContentResource\Pages;

use App\Filament\Resources\P3rpmContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditP3rpmContent extends EditRecord
{
    protected static string $resource = P3rpmContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
