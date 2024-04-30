<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandArticleFactory extends Factory
{
    protected $model = LandArticle::class;

    public function definition(): array
    {
        $land_ids = Land::pluck('id')->toArray();
        $type = $this->faker->randomElement(['blog', 'news', 'sell']);
        $imagePath = 'media/land/articles/1600.png';

        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'type' => $type,
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'body' => $this->faker->paragraph(3, true),
            'image' => $imagePath,
            'publish' => true
        ];
    }
}
