<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\ProvinceCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class IranCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Province::truncate();
        //ProvinceCity::truncate();

        #1
        if (Schema::hasTable('province_cities')) {
            Schema::drop('province_cities');
        }

        #2
        if (Schema::hasTable('provinces')) {
            Schema::drop('provinces');
        }

        #3
        $path = database_path() . '/tables/sql/provinces.sql';
        $sql = File::get($path);
        DB::unprepared($sql);

        #4
        $path = database_path() . '/tables/sql/province_cities.sql';
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
