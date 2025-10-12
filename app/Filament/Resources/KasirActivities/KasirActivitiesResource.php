<?php

namespace App\Filament\Resources\KasirActivities;

use App\Filament\Resources\KasirActivities\Pages\CreateKasirActivities;
use App\Filament\Resources\KasirActivities\Pages\EditKasirActivities;
use App\Filament\Resources\KasirActivities\Pages\ListKasirActivities;
use App\Filament\Resources\KasirActivities\Pages\ViewKasirActivities;
use App\Filament\Resources\KasirActivities\Schemas\KasirActivitiesForm;
use App\Filament\Resources\KasirActivities\Schemas\KasirActivitiesInfolist;
use App\Filament\Resources\KasirActivities\Tables\KasirActivitiesTable;
use App\Models\KasirActivities;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KasirActivitiesResource extends Resource
{
    protected static ?string $model = KasirActivities::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KasirActivitiesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KasirActivitiesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KasirActivitiesTable::configure($table);
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
            'index' => ListKasirActivities::route('/'),
            'create' => CreateKasirActivities::route('/create'),
            'view' => ViewKasirActivities::route('/{record}'),
            'edit' => EditKasirActivities::route('/{record}/edit'),
        ];
    }
}
