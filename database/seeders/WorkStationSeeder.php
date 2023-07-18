<?php

namespace Database\Seeders;

use App\Models\WorkStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WorkStation::create([
            'name' => 'Beta School'
        ]);
    }
}
