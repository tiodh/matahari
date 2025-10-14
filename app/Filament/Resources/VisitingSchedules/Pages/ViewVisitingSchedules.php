<?php

namespace App\Filament\Resources\VisitingSchedules\Pages;

use App\Filament\Resources\VisitingSchedules\VisitingSchedulesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVisitingSchedules extends ViewRecord
{
    protected static string $resource = VisitingSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
