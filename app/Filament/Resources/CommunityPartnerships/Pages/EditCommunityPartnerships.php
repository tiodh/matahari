<?php

namespace App\Filament\Resources\CommunityPartnerships\Pages;

use App\Filament\Resources\CommunityPartnerships\CommunityPartnershipsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCommunityPartnerships extends EditRecord
{
    protected static string $resource = CommunityPartnershipsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
