<?php

namespace App\Filament\Resources\VisitingSchedules\Pages;

use App\Filament\Resources\VisitingSchedules\VisitingSchedulesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVisitingSchedules extends EditRecord
{
    protected static string $resource = VisitingSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
