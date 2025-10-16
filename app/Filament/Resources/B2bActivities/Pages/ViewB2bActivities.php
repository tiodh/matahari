<?php

namespace App\Filament\Resources\B2bActivities\Pages;

use App\Filament\Resources\B2bActivities\B2bActivitiesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewB2bActivities extends ViewRecord
{
    protected static string $resource = B2bActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
