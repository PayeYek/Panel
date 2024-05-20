<?php

namespace Database\Seeders;

use App\Models\Specification;
use App\Models\Usage;
use Illuminate\Database\Seeder;

class UsageSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usages = Usage::all();
        $specifications = Specification::all();

//        // Detach existing relationships if you want to reset them
//        $usages->each(function ($usage) {
//            $usage->specifications()->detach();
//        });

        $usages->each(function ($usage) use ($specifications) {
            $randomSpecifications = $specifications->random(rand(1, 7))->pluck('id');
            $usage->specifications()->attach($randomSpecifications);
        });
    }
}
