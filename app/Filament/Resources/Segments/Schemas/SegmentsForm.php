<?php

namespace App\Filament\Resources\Segments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SegmentsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
