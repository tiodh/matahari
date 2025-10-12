<?php

namespace App\Filament\Resources\KasirActivities\Pages;

use App\Filament\Resources\KasirActivities\KasirActivitiesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKasirActivities extends EditRecord
{
    protected static string $resource = KasirActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
