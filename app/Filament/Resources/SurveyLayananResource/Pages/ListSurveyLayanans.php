<?php

namespace App\Filament\Resources\SurveyLayananResource\Pages;

use App\Filament\Resources\SurveyLayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSurveyLayanans extends ListRecords
{
    protected static string $resource = SurveyLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
