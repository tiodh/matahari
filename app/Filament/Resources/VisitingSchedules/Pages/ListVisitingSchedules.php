<?php

namespace App\Filament\Resources\VisitingSchedules\Pages;

use App\Filament\Resources\VisitingSchedules\VisitingSchedulesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVisitingSchedules extends ListRecords
{
    protected static string $resource = VisitingSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
