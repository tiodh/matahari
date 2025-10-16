<?php

namespace App\Filament\Resources\B2bActivities\Pages;

use App\Filament\Resources\B2bActivities\B2bActivitiesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListB2bActivities extends ListRecords
{
    protected static string $resource = B2bActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
