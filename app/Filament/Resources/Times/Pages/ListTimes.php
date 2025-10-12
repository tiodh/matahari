<?php

namespace App\Filament\Resources\Times\Pages;

use App\Filament\Resources\Times\TimesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTimes extends ListRecords
{
    protected static string $resource = TimesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
