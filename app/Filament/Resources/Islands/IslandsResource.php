<?php

namespace App\Filament\Resources\Islands;

use App\Filament\Resources\Islands\Pages\CreateIslands;
use App\Filament\Resources\Islands\Pages\EditIslands;
use App\Filament\Resources\Islands\Pages\ListIslands;
use App\Filament\Resources\Islands\Pages\ViewIslands;
use App\Filament\Resources\Islands\Schemas\IslandsForm;
use App\Filament\Resources\Islands\Schemas\IslandsInfolist;
use App\Filament\Resources\Islands\Tables\IslandsTable;
use App\Models\Islands;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IslandsResource extends Resource
{
    
    protected static ?string $model = Islands::class;
    
    protected static string|\UnitEnum|null $navigationGroup = 'Config';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;

    public static function form(Schema $schema): Schema
    {
        return IslandsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IslandsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IslandsTable::configure($table);
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
            'index' => ListIslands::route('/'),
            'create' => CreateIslands::route('/create'),
            'view' => ViewIslands::route('/{record}'),
            'edit' => EditIslands::route('/{record}/edit'),
        ];
    }
}
