<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $directory = 'public/media/ad';

        // Check if directory exists and clear it
        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
            Storage::makeDirectory($directory);
        }

        /* Information on the provinces and cities of Iran */
        $this->call(IranCitiesSeeder::class);

        /* Landing */
        $this->call([
            CountrySeeder::class,
            RoleSeeder::class,
            AdminUserSeeder::class,
            CategorySeeder::class,
//            SpecificationSeeder::class,
//            ColorSeeder::class,
//            UsageSeeder::class,
//            UsageSpecificationSeeder::class,
//            SpecificationValueSeeder::class,
            // BrandSeeder::class,
            // ProductModelSeeder::class,
            // AdvertiseSeeder::class
//            AdSeeder::class
            #region Todo delete (landing)
            // LandCategorySeeder::class,
            // LandColorSeeder::class,
            // LandBrandSeeder::class,
            // LandSeeder::class,
            // CompanySeeder::class,
            // LandProductSeeder::class,
            // LandSlideSeeder::class,
            // LandArticleSeeder::class,
            // LandAgencySeeder::class,
            // LandAdvertiseSeeder::class,
            // LandAttributeSeeder::class,
            // LandStyleSeeder::class,
            #endregion
        ]);
    }
}
