<?php

namespace App\Filament\Resources\Segments\Pages;

use App\Filament\Resources\Segments\SegmentsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSegments extends ViewRecord
{
    protected static string $resource = SegmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
