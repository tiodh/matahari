<?php

namespace App\Filament\Pages;

use App\Models\B2bActivities;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use UnitEnum;

class B2bReport extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'B2B Report';
    protected static string|UnitEnum|null $navigationGroup = 'Reports';
    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $title = 'Laporan B2B Sales per Supervisor';

    protected string $view = 'filament.pages.b2b-report';


    public function table(Table $table): Table
    {
        $query = B2bActivities::query()
            ->selectRaw('a.id, b.name as spv_name, SUM(a.sales) as total_sales')
            ->from('b2b_activities as a')
            ->join('users as b', 'a.spv_id', '=', 'b.id')
            ->groupBy('a.id', 'b.name')
            ->orderBy('a.id', 'asc');

        return $table
            ->query($query)
            ->filters([
                // 🗓️ Date range filter
                Filter::make('date_range')
                    ->form([
                        DatePicker::make('start_date')->label('Start Date'),
                        DatePicker::make('end_date')->label('End Date'),
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
            ->defaultSort('spv_name')
            ->columns(
                [
                    TextColumn::make('spv_name')
                        ->label('Supervisor')
                        ->sortable()
                        ->searchable(),

                    TextColumn::make('total_sales')
                        ->label('Total Penjualan')
                        ->sortable()
                        ->money('idr', true),
                ]
            );
    }

    public function activities_table(Table $table): Table
    {
        $query = B2bActivities::query()
            ->selectRaw('a.id, b.name as spv_name, SUM(a.sales) as total_sales')
            ->from('b2b_activities as a')
            ->join('activities as b', 'a.activities_id', '=', 'b.id')
            ->groupBy('a.id', 'b.name')
            ->orderBy('a.id', 'asc');

        return $table
            ->query($query)
            ->filters([
                // 🗓️ Date range filter
                Filter::make('date_range')
                    ->form([
                        DatePicker::make('start_date')->label('Start Date'),
                        DatePicker::make('end_date')->label('End Date'),
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
            ->defaultSort('spv_name')
            ->columns(
                [
                    TextColumn::make('spv_name')
                        ->label('Supervisor')
                        ->sortable()
                        ->searchable(),

                    TextColumn::make('total_sales')
                        ->label('Total Penjualan')
                        ->sortable()
                        ->money('idr', true),
                ]
            );
    }

}
