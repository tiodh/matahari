<?php

namespace App\Filament\Resources\IslandActivities\Pages;

use App\Filament\Resources\IslandActivities\IslandActivitiesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIslandActivities extends ListRecords
{
    protected static string $resource = IslandActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
