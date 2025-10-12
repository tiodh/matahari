<?php

namespace App\Filament\Resources\IslandActivities\Pages;

use App\Filament\Resources\IslandActivities\IslandActivitiesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIslandActivities extends ViewRecord
{
    protected static string $resource = IslandActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
