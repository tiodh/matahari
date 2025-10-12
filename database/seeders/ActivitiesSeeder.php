<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activities;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = ["Storage clean", "Live product", "Bedah konter", "Analisa produk", "Create content", "Contact loyal"];
        foreach($activities as $activity){
            Activities::firstOrCreate([
                "name" => $activity
            ]);
        }
    }
}
