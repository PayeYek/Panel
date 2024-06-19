<?php

namespace Database\Factories;

use App\Enum\AdvertiseStateEnum;
use App\Models\Ads;
use App\Models\Category;
use App\Models\ProvinceCity;
use App\Models\User;
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
        $destinationPath = storage_path('app/public/media/ads/more-images/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/ads/more-images'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        // تولید تعداد تصادفی بین 1 تا 10
        $randomCount = $this->faker->numberBetween(1, 4);

        // ایجاد آرایه ای با تعداد تصادفی از آدرس
        $moreImages = array_fill(0, $randomCount, 'media/ads/more-images/picture.png');

        $imagePath = 'media/ads/primary-image/cover.png';
        $city = ProvinceCity::inRandomOrder()->first();
        $province = $city->province;
        $category = Category::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        return [
            'title'          => $this->faker->sentence,
            'description'    => $this->faker->realText,
            'primary_image'  => $imagePath,
            'more_images'    => $moreImages,
            'city_id'        => $city->id,
            'province_id'    => $province->id,
            'price'          => $this->faker->randomNumber(7),
            'agreement'      => $this->faker->boolean,
            'exchange'       => $this->faker->boolean,
            'category_id'    => $this->faker->randomElement($category),
            'published_date' => $this->faker->dateTime,
            'user_id'        => $this->faker->randomElement($users),
            'state'          => $this->faker->randomElement(AdvertiseStateEnum::values()),
        ];
    }
}
