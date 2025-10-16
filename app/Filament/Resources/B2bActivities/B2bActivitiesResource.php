<?php

namespace App\Filament\Resources\B2bActivities;

use App\Filament\Resources\B2bActivities\Pages\CreateB2bActivities;
use App\Filament\Resources\B2bActivities\Pages\EditB2bActivities;
use App\Filament\Resources\B2bActivities\Pages\ListB2bActivities;
use App\Filament\Resources\B2bActivities\Pages\ViewB2bActivities;
use App\Filament\Resources\B2bActivities\Schemas\B2bActivitiesForm;
use App\Filament\Resources\B2bActivities\Schemas\B2bActivitiesInfolist;
use App\Filament\Resources\B2bActivities\Tables\B2bActivitiesTable;
use App\Models\B2bActivities;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class B2bActivitiesResource extends Resource
{
    protected static ?string $model = B2bActivities::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return B2bActivitiesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return B2bActivitiesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return B2bActivitiesTable::configure($table);
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
            'index' => ListB2bActivities::route('/'),
            'create' => CreateB2bActivities::route('/create'),
            'view' => ViewB2bActivities::route('/{record}'),
            'edit' => EditB2bActivities::route('/{record}/edit'),
        ];
    }
}
