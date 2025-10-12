<?php

namespace App\Filament\Resources\KasirActivities\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class KasirActivitiesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kasir_id')
                    ->relationship(
                        name: 'kasir',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query) => $query
                            ->role('kasir') // only users with this role
                            ->orderBy('id', 'asc'),
                    )
                    ->required(),
                Select::make('times_id')
                    ->relationship('times', 'name')
                    ->required(),
                Select::make('activities_id')
                    ->relationship('activities', 'name')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('brand')
                    ->required(),
                TextInput::make('product_type')
                    ->required(),
                TextInput::make('sales')
                    ->required()
                    ->numeric(),
                FileUpload::make('photo')
                    ->directory('thumbnails') 
                    ->image() 
                    ->maxSize(2048)
                    ->required(),
            ]);
    }
}
