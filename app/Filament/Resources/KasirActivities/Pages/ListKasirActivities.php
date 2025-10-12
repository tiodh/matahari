<?php

namespace App\Filament\Resources\KasirActivities\Pages;

use App\Filament\Resources\KasirActivities\KasirActivitiesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKasirActivities extends ListRecords
{
    protected static string $resource = KasirActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
