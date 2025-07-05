<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PriceList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PriceListFactory extends Factory
{
    protected $model = PriceList::class;

    public function definition(): array
    {
        return [
            'product_name'    => $this->faker->name(),
            'production_year' => $this->faker->randomNumber(),
            'price'           => $this->faker->word(),
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

            'category_id' => Category::factory(),
        ];
    }
}
