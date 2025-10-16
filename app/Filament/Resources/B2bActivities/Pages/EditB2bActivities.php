<?php

namespace App\Filament\Resources\B2bActivities\Pages;

use App\Filament\Resources\B2bActivities\B2bActivitiesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditB2bActivities extends EditRecord
{
    protected static string $resource = B2bActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
