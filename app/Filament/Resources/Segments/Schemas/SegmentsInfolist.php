<?php

namespace App\Filament\Resources\Segments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SegmentsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
