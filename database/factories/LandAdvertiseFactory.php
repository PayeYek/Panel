<?php

namespace Database\Factories;

use App\Models\LandAdvertise;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandAdvertiseFactory extends Factory
{
    protected $model = LandAdvertise::class;

    public function definition(): array
    {
        $land_ids = \App\Models\Land::pluck('id')->toArray();
        $type = $this->faker->randomElement(['land', 'product']);

        $image = $type == 'product'
            ? $this->faker->imageUrl(290, 400, word: $type)
            : $this->faker->imageUrl(2880, 600, word: $type);

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'image' => $image,
            'alt' => $this->faker->paragraph,
            'link' => '#',
            'type' => $type,
            'view' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->boolean,
            'published_at' => null,
            'expired_at' => null,
        ];
    }
}
