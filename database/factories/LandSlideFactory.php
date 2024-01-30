<?php

namespace Database\Factories;

use App\Models\LandSlide;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandSlideFactory extends Factory
{
    protected $model = LandSlide::class;

    public function definition(): array
    {
        $land_ids = \App\Models\Land::pluck('id')->toArray();

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'image' => $this->faker->imageUrl(2880,600, word:$this->faker->randomElement(['A','B','C','D','E'])),
            'alt' => $this->faker->sentence,
            'link' => $this->faker->url,
            'view' => $this->faker->numberBetween(1, 1000),
            'status' => true,
            'published_at' => null,
            'expired_at' => null,
        ];
    }
}
