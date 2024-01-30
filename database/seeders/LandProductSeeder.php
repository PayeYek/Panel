<?php

namespace Database\Seeders;

use App\Models\LandProduct;
use Illuminate\Database\Seeder;

class LandProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandProduct::factory()->count(100)->create();
    }
}
