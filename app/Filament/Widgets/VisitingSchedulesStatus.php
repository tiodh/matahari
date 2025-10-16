<?php

namespace App\Filament\Widgets;

use App\Models\B2bActivities;
use App\Models\VisitingSchedules;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class VisitingSchedulesStatus extends TableWidget
{
    public function table(Table $table): Table
    {
        $currentUserId = Auth::id();
        $usedIds = B2bActivities::where('spv_id', $currentUserId)->pluck('visiting_schedules_id')->toArray();

        return $table
            ->query(fn(): Builder => VisitingSchedules::query()->where('spv_id', $currentUserId))
            ->columns([
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('community_partnerships.name')
                    ->searchable(),
                TextColumn::make('id')
                    ->label('Status')
                    ->formatStateUsing(function ($state, $record) use ($usedIds) {
                        return in_array($record->id, $usedIds)
                            ? '✔ Done'
                            : '⏳ Pending';
                    }),
            ])
            ->filters([
                //
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
