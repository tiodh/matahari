<?php

namespace App\Filament\Resources\KasirActivities\Pages;

use App\Filament\Resources\KasirActivities\KasirActivitiesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKasirActivities extends ViewRecord
{
    protected static string $resource = KasirActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
