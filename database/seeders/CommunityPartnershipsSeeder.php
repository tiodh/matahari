<?php

namespace Database\Seeders;

use App\Models\CommunityPartnerships;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityPartnershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommunityPartnerships::firstOrCreate(['name' => 'Perusahaan 1']);
        CommunityPartnerships::firstOrCreate(['name' => 'Perusahaan 2']);
    }
}
