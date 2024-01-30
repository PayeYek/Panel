<?php

namespace Database\Factories;

use App\Models\LandAgency;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandAgencyFactory extends Factory
{
    protected $model = LandAgency::class;

    public function definition(): array
    {
        $land_ids = \App\Models\Land::pluck('id')->toArray();
        $province_ids = \App\Models\Province::pluck('id')->toArray();
        $province_id = $this->faker->randomElement($province_ids);
        $city = \App\Models\ProvinceCity::where('province_id' , $province_id)->first();

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'province' => $city->province->name,
            'city' => $city->name,
            'code' => $this->faker->numberBetween(100, 200),
            'name' => $this->faker->sentence,
            'address' => $this->faker->paragraph,
            'info' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['A','B','C','D','E']),
        ];
    }
}
