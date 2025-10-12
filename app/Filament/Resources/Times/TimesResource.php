<?php

namespace App\Filament\Resources\Times;

use App\Filament\Resources\Times\Pages\CreateTimes;
use App\Filament\Resources\Times\Pages\EditTimes;
use App\Filament\Resources\Times\Pages\ListTimes;
use App\Filament\Resources\Times\Pages\ViewTimes;
use App\Filament\Resources\Times\Schemas\TimesForm;
use App\Filament\Resources\Times\Schemas\TimesInfolist;
use App\Filament\Resources\Times\Tables\TimesTable;
use App\Models\Times;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TimesResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'Config';

    protected static ?string $model = Times::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Clock;

    public static function form(Schema $schema): Schema
    {
        return TimesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TimesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TimesTable::configure($table);
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
            'index' => ListTimes::route('/'),
            'create' => CreateTimes::route('/create'),
            'view' => ViewTimes::route('/{record}'),
            'edit' => EditTimes::route('/{record}/edit'),
        ];
    }
}
