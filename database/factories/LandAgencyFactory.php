<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandAgency;
use App\Models\Province;
use App\Models\ProvinceCity;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandAgencyFactory extends Factory
{
    protected $model = LandAgency::class;

    public function definition(): array
    {
        $land_ids = Land::pluck('id')->toArray();
        $province_ids = Province::pluck('id')->toArray();
        $province_id = $this->faker->randomElement($province_ids);
        $city = ProvinceCity::where('province_id', $province_id)->first();

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'province_id' => $city->province->id,
            'city_id' => $city->id,
            'code' => $this->faker->numberBetween(100, 200),
            'name' => $this->faker->sentence,
            'address' => $this->faker->paragraph,
//            'info' => $this->faker->paragraph,
            'types' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
