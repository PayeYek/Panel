<?php

namespace Database\Factories;

use App\Models\LandBrand;
use App\Support\Help;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandColorFactory extends Factory
{
    protected $model = LandBrand::class;

    public function definition(): array
    {
        return [
            'name' => null,
            'title' => null,
        ];
    }
}
