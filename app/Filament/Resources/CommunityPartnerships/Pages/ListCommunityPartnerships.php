<?php

namespace App\Filament\Resources\CommunityPartnerships\Pages;

use App\Filament\Resources\CommunityPartnerships\CommunityPartnershipsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCommunityPartnerships extends ListRecords
{
    protected static string $resource = CommunityPartnershipsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
