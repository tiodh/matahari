<?php

namespace App\Filament\Resources\CommunityPartnerships\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommunityPartnershipsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('segments_id')
                    ->relationship('segments', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
