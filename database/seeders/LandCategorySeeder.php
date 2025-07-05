<?php

namespace Database\Seeders;

use App\Models\Land;
use App\Models\LandCategory;
use Illuminate\Database\Seeder;

class LandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roadTransportationArray = [
            [
                "title" => "کامیون",
                "slug" => "truck",
            ],
            [
                "title" => "کشنده",
                "slug" => "tractor",
            ],
            [
                "title" => "تریلر",
                "slug" => "trailer",
            ],
            [
                "title" => "کامیونت",
                "slug" => "pickup-truck",
            ],
            [
                "title" => "ون",
                "slug" => "van",
            ],
            [
                "title" => "اتوبوس",
                "slug" => "bus",
            ],
            [
                "title" => "مینی بوس",
                "slug" => "minibus",
            ],
            [
                "title" => "کاروان",
                "slug" => "caravan",
            ],
            [
                "title" => "پیکاپ",
                "slug" => "pickup",
            ],
        ];

//        $lands = Land::get();
//        foreach ($lands as $land) {
            foreach ($roadTransportationArray as $type) {
//                $type['land_id'] = $land->id;
                LandCategory::factory()->create($type);
            }
//        }

    }
}
