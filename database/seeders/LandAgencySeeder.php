<?php

namespace Database\Seeders;

use App\Models\LandAgency;
use Illuminate\Database\Seeder;

class LandAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandAgency::factory()->count(50)->create();
    }
}
