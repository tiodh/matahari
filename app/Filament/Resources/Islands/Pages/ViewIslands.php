<?php

namespace App\Filament\Resources\Islands\Pages;

use App\Filament\Resources\Islands\IslandsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIslands extends ViewRecord
{
    protected static string $resource = IslandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
