<?php

namespace App\Filament\Resources\SurveyLayananResource\Pages;

use App\Filament\Resources\SurveyLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSurveyLayanan extends EditRecord
{
    protected static string $resource = SurveyLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
