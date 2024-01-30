<?php

namespace Database\Seeders;

use App\Models\LandBrand;
use App\Models\LandColor;
use App\Support\Help;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LandColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = Help::colors();

//        $colors = array_slice($colors, 2, null, true);

        $transformed_array = array_map(function ($key, $value) {
            return array('name' => $key, 'title' => $value);
        }, array_keys($colors), $colors);
        foreach ($transformed_array as $color) {
            LandColor::create($color);
        }
    }
}
