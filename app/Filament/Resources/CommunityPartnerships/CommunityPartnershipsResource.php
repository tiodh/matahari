<?php

namespace App\Filament\Resources\CommunityPartnerships;

use App\Filament\Resources\CommunityPartnerships\Pages\CreateCommunityPartnerships;
use App\Filament\Resources\CommunityPartnerships\Pages\EditCommunityPartnerships;
use App\Filament\Resources\CommunityPartnerships\Pages\ListCommunityPartnerships;
use App\Filament\Resources\CommunityPartnerships\Pages\ViewCommunityPartnerships;
use App\Filament\Resources\CommunityPartnerships\Schemas\CommunityPartnershipsForm;
use App\Filament\Resources\CommunityPartnerships\Schemas\CommunityPartnershipsInfolist;
use App\Filament\Resources\CommunityPartnerships\Tables\CommunityPartnershipsTable;
use App\Models\CommunityPartnerships;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CommunityPartnershipsResource extends Resource
{
    protected static ?string $model = CommunityPartnerships::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CommunityPartnershipsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CommunityPartnershipsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CommunityPartnershipsTable::configure($table);
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
            'index' => ListCommunityPartnerships::route('/'),
            'create' => CreateCommunityPartnerships::route('/create'),
            'view' => ViewCommunityPartnerships::route('/{record}'),
            'edit' => EditCommunityPartnerships::route('/{record}/edit'),
        ];
    }
}
