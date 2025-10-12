<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visits;

class VisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visits::firstOrCreate(["name" => "Visit 1"]);
        Visits::firstOrCreate(["name" => "Visit 2"]);
        Visits::firstOrCreate(["name" => "Visit 3"]);
    }
}
