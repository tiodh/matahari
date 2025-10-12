<?php

namespace App\Filament\Resources\KasirActivities\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class KasirActivitiesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kasir_id')
                    ->numeric(),
                TextEntry::make('times_id')
                    ->numeric(),
                TextEntry::make('activities_id')
                    ->numeric(),
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
