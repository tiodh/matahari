<?php

namespace App\Filament\Resources\Segments\Pages;

use App\Filament\Resources\Segments\SegmentsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSegments extends EditRecord
{
    protected static string $resource = SegmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
