<?php

namespace App\Filament\Resources\VisitingSchedules;

use App\Filament\Resources\VisitingSchedules\Pages\CreateVisitingSchedules;
use App\Filament\Resources\VisitingSchedules\Pages\EditVisitingSchedules;
use App\Filament\Resources\VisitingSchedules\Pages\ListVisitingSchedules;
use App\Filament\Resources\VisitingSchedules\Pages\ViewVisitingSchedules;
use App\Filament\Resources\VisitingSchedules\Schemas\VisitingSchedulesForm;
use App\Filament\Resources\VisitingSchedules\Schemas\VisitingSchedulesInfolist;
use App\Filament\Resources\VisitingSchedules\Tables\VisitingSchedulesTable;
use App\Models\VisitingSchedules;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisitingSchedulesResource extends Resource
{
    protected static ?string $model = VisitingSchedules::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return VisitingSchedulesForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VisitingSchedulesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitingSchedulesTable::configure($table);
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
            'index' => ListVisitingSchedules::route('/'),
            'create' => CreateVisitingSchedules::route('/create'),
            'view' => ViewVisitingSchedules::route('/{record}'),
            'edit' => EditVisitingSchedules::route('/{record}/edit'),
        ];
    }
}
