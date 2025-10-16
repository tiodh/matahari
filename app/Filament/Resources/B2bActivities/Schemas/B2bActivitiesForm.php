<?php

namespace App\Filament\Resources\B2bActivities\Schemas;

use App\Models\B2bActivities;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class B2bActivitiesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('visiting_schedules_id')
                    ->relationship(
                        name: 'visiting_schedules',
                        titleAttribute: 'id',
                        modifyQueryUsing: fn($query) => $query
                            ->with('community_partnerships')
                            ->whereNotIn('id', B2bActivities::pluck('visiting_schedules_id'))
                    )
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        return "(" . \Carbon\Carbon::parse($record->start_date)->format('d M Y') . ' - ' . \Carbon\Carbon::parse($record->end_date)->format('d M Y') . ") " . ($record->community_partnerships->name ?? '');
                    })
                    ->label('Visiting Schedule (Date & Partnership)')
                    ->required(),
                Select::make('spv_id')
                    ->relationship('spv', 'name')
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
