<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandBrand;
use App\Models\LandCategory;
use App\Models\LandProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandProductFactory extends Factory
{
    protected $model = LandProduct::class;

    public function definition(): array
    {
        $land_ids = Land::pluck('id')->toArray();
        $category_ids = LandCategory::pluck('id')->toArray();
        $brand_ids = LandBrand::pluck('id')->toArray();
        return [
            'land_id' => $this->faker->randomElement($land_ids),
            'category_id' => $this->faker->randomElement($category_ids),
            'brand_id' => $this->faker->randomElement($brand_ids),
            'slug' => $this->faker->slug,
            'name' => $this->faker->word,
            'model' => $this->faker->bothify('m-???###'),
            'year' => $this->faker->year,
            'tonnage' => null,
            'axle' => null,
            'usage' => null,
            'cabin' => null,
            'image' => $this->faker->imageUrl(512, 512, word: 'Product'),
            'description' => $this->faker->paragraph,
            'body' => $this->faker->paragraph,
            'catalog' => null,
            'manual' => null,
            'country' => null,
            'view' => $this->faker->numberBetween(50, 1000),
            'pictures' => [],
        ];
    }
}
