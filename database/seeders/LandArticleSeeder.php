<?php

namespace Database\Seeders;

use App\Models\LandArticle;
use Illuminate\Database\Seeder;

class LandArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandArticle::factory()->count(100)->create();
    }
}
