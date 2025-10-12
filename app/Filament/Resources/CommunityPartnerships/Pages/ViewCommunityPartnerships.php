<?php

namespace App\Filament\Resources\CommunityPartnerships\Pages;

use App\Filament\Resources\CommunityPartnerships\CommunityPartnershipsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCommunityPartnerships extends ViewRecord
{
    protected static string $resource = CommunityPartnershipsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
