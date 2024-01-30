<?php

namespace Database\Seeders;

use App\Models\LandBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LandBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        LandBrand::factory()->count(30)->create();

        $heavyVehicleBrands = [
            ["title" => "Benz", "country" => "Germany"],
            ["title" => "Volvo", "country" => "Sweden"],
            ["title" => "MAN", "country" => "Germany"],
            ["title" => "Scania", "country" => "Sweden"],
            ["title" => "DAF", "country" => "Netherlands"],
            ["title" => "Iveco", "country" => "Italy"],
            ["title" => "King Long", "country" => "China"],
            ["title" => "Hualing Xingma", "country" => "China"],
            ["title" => "Great Wall Motors", "country" => "China"],
            ["title" => "BYD", "country" => "China"],
            ["title" => "Foton", "country" => "China"],
            ["title" => "Dongfeng", "country" => "China"],
            ["title" => "JAC", "country" => "China"]
        ];

        foreach ($heavyVehicleBrands as $brand) {
            $brand['slug'] = Str::slug($brand['title']);
            LandBrand::factory()->create($brand);
        }
    }
}
