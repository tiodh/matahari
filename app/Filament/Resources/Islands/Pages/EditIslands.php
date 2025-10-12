<?php

namespace App\Filament\Resources\Islands\Pages;

use App\Filament\Resources\Islands\IslandsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIslands extends EditRecord
{
    protected static string $resource = IslandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
