<?php

namespace App\Filament\Resources\VisitingSchedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use App\Models\User;
use App\Models\CommunityPartnerships;

class VisitingSchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('spv.name')
                    ->searchable(),
                TextColumn::make('community_partnerships.name')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('year'),
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
                Filter::make('current_week')
                    ->label('Current 7 Days')
                    ->query(function ($query) {
                        $today = date('Y-m-d');
                        $sevenDays = date('Y-m-d', strtotime('+7 days'));
                        return $query->whereBetween('start_date', [$today, $sevenDays]);
                    })
                    ->default(true),
                SelectFilter::make('year')
                    ->label('Year')
                    ->options(
                        \App\Models\VisitingSchedules::query()
                            ->select('year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year', 'year')
                            ->toArray()
                    )
                    ->default(date('Y')),
                Filter::make('start_date')
                    ->form([
                        DatePicker::make('start')->label('Start'),
                        DatePicker::make('end')->label('End'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start'], fn($q) => $q->where('start_date', '>=', $data['start']))
                            ->when($data['end'], fn($q) => $q->where('start_date', '<=', $data['end']));
                    }),
                SelectFilter::make('spv_id')
                    ->label('SPV')
                    ->options(
                        User::role('spv')->pluck('name', 'id')->toArray()
                    ),
                SelectFilter::make('community_partnerships_id')
                    ->label('Community Partnership')
                    ->options(
                        CommunityPartnerships::pluck('name', 'id')->toArray()
                    ),
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
