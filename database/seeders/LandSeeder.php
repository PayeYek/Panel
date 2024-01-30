<?php

namespace Database\Seeders;

use App\Models\Land;
use Illuminate\Database\Seeder;

class LandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Land::factory()->count(10)->create();
    }
}
