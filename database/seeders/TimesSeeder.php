<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Times;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=10;$i<=31;$i+=2){
            Times::firstOrCreate(["name" => $i."-".($i+2)]);
        }
    }
}
