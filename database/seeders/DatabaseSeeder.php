<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Information on the provinces and cities of Iran */
        $this->call(IranCitiesSeeder::class);

        /* Landing */
        $this->call([
            LandCategorySeeder::class,
            LandColorSeeder::class,
            LandBrandSeeder::class,
            LandSeeder::class,
            LandProductSeeder::class,
            LandSlideSeeder::class,
            LandArticleSeeder::class,
            LandAgencySeeder::class,
            LandAdvertiseSeeder::class,
            LandAttributeSeeder::class,
        ]);
    }
}
