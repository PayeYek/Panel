<?php

namespace Database\Factories;

use App\Models\Ads;
use App\Models\LandBrand;
use App\Models\LandCategory;
use App\Models\ProvinceCity;
use App\Models\Usage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class AdsFactory extends Factory
{
    protected $model = Ads::class;

    public function definition(): array
    {
        /* Cover image */
        $sourcePath = public_path('assets/images/empty/cover.png');
        $destinationPath = storage_path('app/public/media/ads/primary-image/cover.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/ads/primary-image'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $destinationPath = storage_path('app/public/media/ads/slider-images/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/ads/slider-images'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        // تولید تعداد تصادفی بین 1 تا 10
        $randomCount = $this->faker->numberBetween(1, 4);

        // ایجاد آرایه ای با تعداد تصادفی از آدرس
        $sliderImages = array_fill(0, $randomCount, 'media/ads/slider-images/picture.png');

        $imagePath = 'media/ads/primary-image/cover.png';
        $city = ProvinceCity::find(rand(1, 1000));
        $province = $city->province;
        $brand = LandBrand::pluck('id')->toArray();
        $category = LandCategory::pluck('id')->toArray();
        $usage = Usage::pluck('id')->toArray();

        return [
            'title'                      => $this->faker->sentence,
            'description'                => $this->faker->realText,
            'communication_mobile'       => '912' . $this->faker->numberBetween(1234567, 9999999),
            'primary_image'              => $imagePath,
//            'slider_images'              => json_encode($sliderImages),  // Convert array to JSON string
            'car_condition'              => $this->faker->randomElement(['نو', 'کارکرده']),
            'mileage'                    => $this->faker->randomNumber(6),
            'production_year'            => $this->faker->numberBetween(1350, 1403),
            'city_id'                    => $city->id,  // Use the city ID
            'province_id'                => $province->id,  // Use the province ID
            'color'                      => $this->faker->colorName,
            'brand_id'                   => $this->faker->randomElement($brand),
            'model'                      => $this->faker->word,
            'fuel_type'                  => $this->faker->word,
            'engine_condition'           => $this->faker->sentence,
            'chassis_condition'          => $this->faker->sentence,
            'body_condition'             => $this->faker->sentence,
            'third_party_insurance_date' => $this->faker->numberBetween(1, 12),
            'price'                      => $this->faker->randomNumber(7),
            'agreement'                  => $this->faker->boolean,
            'category_id'                => $this->faker->randomElement($category),
            'usage_id'                   => $this->faker->randomElement($usage),
            'published_date'             => $this->faker->dateTime,
            'gearbox_type'               => $this->faker->randomElement(['اتوماتیک', 'دستی']),
            'state'                      => 1,
        ];
    }
}
