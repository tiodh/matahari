<?php

namespace App\Filament\Resources\B2bActivities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class B2bActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Visiting Schedules')
                    ->getStateUsing(fn($record)=>
                        "{$record->spv->name} - {$record->visiting_schedules->community_partnerships->name}"
                    )
                    ->searchable(),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->visibility('public'),
                TextColumn::make('spv.name')
                    ->searchable(),
                TextColumn::make('times.name')
                    ->searchable(),
                TextColumn::make('activities.name')
                    ->searchable(),
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
                                ->withFilename(fn() => 'B2B Activities-' . now()->format('Ymd'))
                                ->withColumns([
                                    Column::make('supervisors')
                                        ->heading('Supervisor & Community')
                                        ->getStateUsing(
                                            fn($record) => ($record->spv?->name ?? '-') . ' / ' . ($record->visiting_schedules->community_partnerships?->name ?? '-')
                                        ),

                                    Column::make('photo')
                                        ->heading('Photo')
                                        ->formatStateUsing(
                                            fn($state) =>
                                            $state ? URL::to($state) : '-'
                                        ),
                                    Column::make('spv.name')->heading('Supervisor'),
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
            ]);
    }
}
