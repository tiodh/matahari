<?php

namespace App\Filament\Resources\B2bActivities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class B2bActivitiesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('visiting_schedules.id')
                    ->label('Visiting schedules'),
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
                TextEntry::make('photo'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
