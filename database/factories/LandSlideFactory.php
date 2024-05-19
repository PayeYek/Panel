<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandSlide;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class LandSlideFactory extends Factory
{
    protected $model = LandSlide::class;

    public function definition(): array
    {

        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $destinationPath = storage_path('app/public/media/land/slides/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/land/slides'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        $land_ids = Land::pluck('id')->toArray();
        $imagePath = 'media/land/slides/picture.png';

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
