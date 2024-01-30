<?php

namespace Database\Seeders;

use App\Models\LandAdvertise;
use Illuminate\Database\Seeder;

class LandAdvertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandAdvertise::factory()->count(100)->create();
    }
}
