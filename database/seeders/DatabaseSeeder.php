<?php

namespace Database\Seeders;

use App\Models\CommunityPartnerships;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $spvRole = Role::firstOrCreate(['name' => 'spv']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);
        $salesRole = Role::firstOrCreate(['name' => 'sales']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@matahari.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin'), // change as needed
            ]
        );
        $admin->assignRole($adminRole);

        $manager = User::firstOrCreate(
            ['email' => 'manager@matahari.com'],
            [
                'name' => 'Manager',
                'password' => Hash::make('manager'), // change as needed
            ]
        );
        $manager->assignRole($managerRole);

        $kasir = User::firstOrCreate(
            ['email' => 'kasir@matahari.com'],
            [
                'name' => 'Kasir',
                'password' => Hash::make('kasir'), // change as needed
            ]
        );
        $kasir->assignRole($kasirRole);

        $sales = User::firstOrCreate(
            ['email' => 'sales@matahari.com'],
            [
                'name' => 'Sales',
                'password' => Hash::make('sales'), // change as needed
            ]
        );
        $sales->assignRole($salesRole);

        $SPV_NAMES = ["Karel", "Ida", "Doni", "Juri", "Rita", "Heny", "Eben", "Veron", "Fatur"];
        foreach($SPV_NAMES as $name){
            $user = User::firstOrCreate(
                ['email' => $name.'@matahari.com'],
                [
                    'name' => $name,
                    'password' => Hash::make($name), // change as needed
                ]
            );
            $user->assignRole($spvRole);
        }

        $this->call([
            IslandsSeeder::class,
            VisitsSeeder::class,
            TimesSeeder::class,
            ActivitiesSeeder::class,
            SegmentsSeeder::class,
            CommunityPartnershipsSeeder::class,
        ]);
    }
}
