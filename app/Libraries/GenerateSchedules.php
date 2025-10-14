<?php

namespace App\Libraries;

use Carbon\Carbon;
use App\Models\User;
use App\Models\CommunityPartnerships;
use App\Models\VisitingSchedules;

class GenerateSchedules
{
    public static function run($year)
    {
        $users = User::role('spv')->get();
        $partnerships = CommunityPartnerships::get();
        $weeksInYear = (int) Carbon::createFromDate($year, 12, 28)->format('W');

        for ($week = 1; $week <= $weeksInYear; $week++) {
            $start = Carbon::create($year, 1, 1)->setISODate($year, $week)->startOfWeek(Carbon::MONDAY);
            $end = Carbon::create($year, 1, 1)->setISODate($year, $week)->endOfWeek(Carbon::SUNDAY);


            foreach ($users as $user) {
                $selectedPartnerships = $partnerships->random(3);

                foreach ($selectedPartnerships as $partnership) {
                    VisitingSchedules::create([
                        'spv_id' => $user->id,
                        'community_partnerships_id' => $partnership->id,
                        'start_date' => $start->toDateString(),
                        'end_date' => $end->toDateString(),
                        'week' => $week,
                        'year' => $year,
                    ]);
                }
            }
        }
    }
}
