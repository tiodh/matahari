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
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class KasirActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kasir.name')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->searchable(),
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
            ->defaultSort('created_at','desc')
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
            ])
            ->headerActions([
                ExportAction::make()
                    ->exports(
                        [
                            ExcelExport::make()
                                ->withFilename(fn() => 'Kasir Activities-' . now()->format('Ymd'))
                                ->withColumns([
                                    Column::make('photo')
                                        ->heading('Photo')
                                        ->formatStateUsing(
                                            fn($state) =>
                                            $state ? URL::to($state) : '-'
                                        ),
                                    Column::make('kasir.name')->heading('Supervisor'),
                                    Column::make('time.name')->heading('Time'),
                                    Column::make('activities.name')->heading('Activity'),
                                    Column::make('date')
                                        ->heading('Date')
                                        ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d-m-Y') : null),
                                    Column::make('brand')->heading('Brand'),
                                    Column::make('product_type')->heading('Product Type'),
                                    Column::make('sales')->heading('Sales'),
                                    Column::make('created_at')
                                        ->heading('Created At')
                                        ->formatStateUsing(fn($state) => $state ? Carbon::parse($state)->format('d-m-Y') : null),
                                ])
                        ]
                    ),
            ]);;
    }
}
