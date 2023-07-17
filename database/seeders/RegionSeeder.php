<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions =  [
            ['region' => 'Ashanti'],
            ['region' => 'Bono'],
            ['region' => 'Bono East'],
            ['region' => 'Ahafo'],
            ['region' => 'Central'],
            ['region' => 'Eastern'],
            ['region' => 'Greater Accra'],
            ['region' => 'Savannah'],
            ['region' => 'Northern'],
            ['region' => 'North East'],
            ['region' => 'Upper West'],
            ['region' => 'Upper East'],
            ['region' => 'Volta'],
            ['region' => 'Oti'],
            ['region' => 'Sekondi-Takoradi	Western'],
            ['region' => 'Western North'],
        ];

        foreach($regions as $region ){
            Region::create($region);
        }
    }
}
