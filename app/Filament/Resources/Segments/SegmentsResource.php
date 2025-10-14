<?php

namespace App\Filament\Resources\Segments;

use App\Filament\Resources\Segments\Pages\CreateSegments;
use App\Filament\Resources\Segments\Pages\EditSegments;
use App\Filament\Resources\Segments\Pages\ListSegments;
use App\Filament\Resources\Segments\Pages\ViewSegments;
use App\Filament\Resources\Segments\Schemas\SegmentsForm;
use App\Filament\Resources\Segments\Schemas\SegmentsInfolist;
use App\Filament\Resources\Segments\Tables\SegmentsTable;
use App\Models\Segments;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SegmentsResource extends Resource
{
    protected static ?string $model = Segments::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SegmentsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SegmentsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SegmentsTable::configure($table);
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
            'index' => ListSegments::route('/'),
            'create' => CreateSegments::route('/create'),
            'view' => ViewSegments::route('/{record}'),
            'edit' => EditSegments::route('/{record}/edit'),
        ];
    }
}
