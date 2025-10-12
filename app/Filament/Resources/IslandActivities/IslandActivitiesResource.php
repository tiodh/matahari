<?php

namespace App\Filament\Resources\IslandActivities;

use App\Filament\Resources\IslandActivities\Pages\CreateIslandActivities;
use App\Filament\Resources\IslandActivities\Pages\EditIslandActivities;
use App\Filament\Resources\IslandActivities\Pages\ListIslandActivities;
use App\Filament\Resources\IslandActivities\Pages\ViewIslandActivities;
use App\Filament\Resources\IslandActivities\Schemas\IslandActivitiesForm;
use App\Filament\Resources\IslandActivities\Schemas\IslandActivitiesInfolist;
use App\Filament\Resources\IslandActivities\Tables\IslandActivitiesTable;
use App\Models\IslandActivities;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IslandActivitiesResource extends Resource
{
    protected static ?string $model = IslandActivities::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IslandActivitiesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IslandActivitiesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IslandActivitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIslandActivities::route('/'),
            'create' => CreateIslandActivities::route('/create'),
            'view' => ViewIslandActivities::route('/{record}'),
            'edit' => EditIslandActivities::route('/{record}/edit'),
        ];
    }
}
