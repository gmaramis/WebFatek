<?php

namespace App\Filament\Resources\SurveyLayananResource\Pages;

use App\Filament\Resources\SurveyLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSurveyLayanan extends ViewRecord
{
    protected static string $resource = SurveyLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
} 