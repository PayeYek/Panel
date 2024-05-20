<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandArticle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class LandArticleFactory extends Factory
{
    protected $model = LandArticle::class;

    public function definition(): array
    {
        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $destinationPath = storage_path('app/public/media/land/articles/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/land/articles'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        $land_ids = Land::pluck('id')->toArray();
        $type = $this->faker->randomElement(['blog', 'news', 'sell']);
        $imagePath = 'media/land/articles/picture.png';

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
