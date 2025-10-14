<?php

namespace App\Filament\Resources\VisitingSchedules\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisitingSchedulesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('spv_id')
                    ->relationship('spv', 'name')
                    ->required(),
                Select::make('community_partnerships_id')
                    ->relationship('community_partnerships', 'name')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                Textarea::make('week')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('year')
                    ->required(),
            ]);
    }
}
