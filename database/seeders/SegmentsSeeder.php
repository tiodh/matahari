<?php

namespace Database\Seeders;

use App\Models\Segments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $segments = [
            [1,'Pemerintahan & Layanan Publik'],
            [2,'Pendidikan Tinggi'],
            [3,'Kesehatan'],
            [4,'BUMN/BUMD (Utilitas)'],
            [5,'Perbankan & Keuangan'],
            [6,'Transportasi & Logistik'],
            [7,'Ritel & Mal'],
            [8,'Perhotelan'],
            [9,'Telekomunikasi & Internet'],
        ];

        foreach($segments as $segment)
        {
            Segments::firstOrCreate([
                'id'=>$segment[0],
                'name'=> $segment[1]
            ]);
        }
    }
}
