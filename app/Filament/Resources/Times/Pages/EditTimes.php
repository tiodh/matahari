<?php

namespace App\Filament\Resources\Times\Pages;

use App\Filament\Resources\Times\TimesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTimes extends EditRecord
{
    protected static string $resource = TimesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
