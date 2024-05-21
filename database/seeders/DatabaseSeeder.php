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
            CountrySeeder::class,
            AdminUserSeeder::class,
            LandCategorySeeder::class,
            LandColorSeeder::class,
            LandBrandSeeder::class,
            LandSeeder::class,
            CompanySeeder::class,
            LandProductSeeder::class,
            LandSlideSeeder::class,
            LandArticleSeeder::class,
            LandAgencySeeder::class,
            LandAdvertiseSeeder::class,
            LandAttributeSeeder::class,
            LandStyleSeeder::class,
            CategorySeeder::class,
            SpecificationSeeder::class,
            ColorSeeder::class,
            UsageSeeder::class,
            UsageSpecificationSeeder::class,
            SpecificationValueSeeder::class,
            BrandSeeder::class,
            ProductModelSeeder::class,
            AdvertiseSeeder::class
        ]);

        auth()->loginUsingId(1, true);

    }
}
