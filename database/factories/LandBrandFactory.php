<?php

namespace Database\Factories;

use App\Models\LandBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandBrandFactory extends Factory
{
    protected $model = LandBrand::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(512, 512),
            'country' => null,
            'description' => $this->faker->paragraph,
        ];
    }
}
