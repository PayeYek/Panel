<?php

namespace Database\Factories;

use App\Models\Land;
use App\Models\LandBrand;
use App\Models\LandCategory;
use App\Models\LandProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class LandProductFactory extends Factory
{
    protected $model = LandProduct::class;

    public function definition(): array
    {

        /* Cover image */
        $sourcePath = public_path('assets/images/empty/cover.png');
        $destinationPath = storage_path('app/public/media/land/products/cover.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/land/products'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $destinationPath = storage_path('app/public/media/land/products/more/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/land/products/more'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        // تولید تعداد تصادفی بین 1 تا 10
        $randomCount = $this->faker->numberBetween(0, 4);

        // ایجاد آرایه ای با تعداد تصادفی از آدرس
        $pictures = array_fill(0, $randomCount, 'media/land/products/more/picture.png');

        $land_ids = Land::pluck('id')->toArray();
        $category_ids = LandCategory::pluck('id')->toArray();
        $brand_ids = LandBrand::pluck('id')->toArray();
        $imagePath = 'media/land/products/cover.png';

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
            'image' => $imagePath,
            'description' => $this->faker->paragraph,
            'body' => $this->faker->paragraph,
            'catalog' => null,
            'manual' => null,
            'country' => null,
            'view' => $this->faker->numberBetween(50, 1000),
            'pictures' => $pictures,
        ];
    }
}
