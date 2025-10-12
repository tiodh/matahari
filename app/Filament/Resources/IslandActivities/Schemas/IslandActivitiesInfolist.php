<?php

namespace App\Filament\Resources\IslandActivities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class IslandActivitiesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('islands.name')
                    ->label('Islands'),
                TextEntry::make('spv.name')
                    ->label('Spv'),
                TextEntry::make('times.name')
                    ->label('Times'),
                TextEntry::make('activities.name')
                    ->label('Activities'),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('brand'),
                TextEntry::make('product_type'),
                TextEntry::make('sales')
                    ->numeric(),
                ImageEntry::make('photo'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
