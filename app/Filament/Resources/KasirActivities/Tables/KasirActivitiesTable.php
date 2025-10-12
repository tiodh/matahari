<?php

namespace App\Filament\Resources\KasirActivities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Carbon;

class KasirActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->searchable(),
                TextColumn::make('kasir.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('times.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('activities.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('product_type')
                    ->searchable(),
                TextColumn::make('sales')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('kasir_id')
                    ->label('Kasir')
                    ->relationship(
                        name: 'kasir',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn($query) => $query->role('kasir')->orderBy('name', 'asc')
                    )
                    ->searchable()
                    ->preload(),
                Filter::make('today')
                    ->label('Today')
                    ->query(fn($query) => $query->whereDate('date', Carbon::today())),
                Filter::make('this_week')
                    ->label('This Week')
                    ->query(fn($query) => $query->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
