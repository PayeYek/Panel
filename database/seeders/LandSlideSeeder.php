<?php

namespace Database\Seeders;

use App\Models\LandSlide;
use Illuminate\Database\Seeder;

class LandSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandSlide::factory()->count(100)->create();
    }
}
