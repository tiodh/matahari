<?php

namespace App\Filament\Resources\Times\Pages;

use App\Filament\Resources\Times\TimesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTimes extends ViewRecord
{
    protected static string $resource = TimesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
