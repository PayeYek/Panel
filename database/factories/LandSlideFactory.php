<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandSlide;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandSlideFactory extends Factory
{
    protected $model = LandSlide::class;

    public function definition(): array
    {
        $land_ids = Land::pluck('id')->toArray();
        $imagePath = 'media/land/slides/1600.png';

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'image' => $imagePath,
            'alt' => $this->faker->sentence,
            'link' => $this->faker->url,
            'view' => $this->faker->numberBetween(1, 1000),
            'status' => true,
            'published_at' => null,
            'expired_at' => null,
        ];
    }
}
