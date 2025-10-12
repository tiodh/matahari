<?php

namespace App\Filament\Resources\Islands\Pages;

use App\Filament\Resources\Islands\IslandsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIslands extends ListRecords
{
    protected static string $resource = IslandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
