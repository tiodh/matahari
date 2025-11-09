<?php

namespace App\Filament\Widgets;

use App\Models\B2bActivities;
use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class B2BActivitiesReport extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
        ->heading('B2B Activities Report ')
            ->query(
                fn(): Builder =>
                B2bActivities::query()
                    ->selectRaw('a.id, b.name as activities_name, SUM(a.sales) as total_sales')
                    ->from('b2b_activities as a')
                    ->join('activities as b', 'a.spv_id', '=', 'b.id')
                    ->groupBy('a.id', 'b.name')
                    ->orderBy('a.id', 'asc')
            )
            ->columns([
                TextColumn::make('activities_name')
                    ->sortable(),
                TextColumn::make('total_sales')
                    ->sortable()
            ])
            ->filters([
                Filter::make('date_range')
                    ->form([
                        DatePicker::make('start_date')
                            ->label('Start Date')
                            ->default(Carbon::now()->subDays(30)),
                        DatePicker::make('end_date')
                            ->label('End Date')
                            ->default(Carbon::now()),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn($q) =>
                                $q->whereDate('a.date', '>=', $data['start_date'])
                            )
                            ->when(
                                $data['end_date'],
                                fn($q) =>
                                $q->whereDate('a.date', '<=', $data['end_date'])
                            );
                    }),
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
