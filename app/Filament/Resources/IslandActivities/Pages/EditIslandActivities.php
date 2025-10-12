<?php

namespace App\Filament\Resources\IslandActivities\Pages;

use App\Filament\Resources\IslandActivities\IslandActivitiesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIslandActivities extends EditRecord
{
    protected static string $resource = IslandActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
