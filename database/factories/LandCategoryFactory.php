<?php

namespace Database\Factories;

use App\Models\LandCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandCategoryFactory extends Factory
{
    protected $model = LandCategory::class;

    public function definition(): array
    {
        $logo = $this->faker->imageUrl(512,512, word:$this->faker->randomElement(['A','B','C','D','E']));
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
//            'logo' => $logo,
//            'logo_origin' => $logo,
//            'description' => $this->faker->paragraph
        ];
    }
}
