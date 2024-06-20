<?php

namespace Database\Factories;

use App\Enum\AdvertiseStateEnum;
use App\Models\Category;
use App\Models\ProvinceCity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* Cover image */
        $sourcePath = public_path('assets/images/empty/cover.png');
        $destinationPath = storage_path('app/public/media/ad/image/cover.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/ad/image'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $destinationPath = storage_path('app/public/media/ad/more/picture.png');
        if (File::exists($sourcePath)) {
            if (!File::exists($destinationPath)) {
                File::ensureDirectoryExists(storage_path('app/public/media/ad/more'));
                File::copy($sourcePath, $destinationPath);
            }
        }

        // تولید تعداد تصادفی بین 1 تا 10
        $randomCount = $this->faker->numberBetween(1, 4);

        // ایجاد آرایه ای با تعداد تصادفی از آدرس
        $moreImages = array_fill(0, $randomCount, 'media/ad/more/picture.png');

        $imagePath = 'media/ad/image/cover.png';
        $city = ProvinceCity::inRandomOrder()->first();
        $province = $city->province;
        $category = Category::whereNotNull('parent_id')->get()->pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        $title = $this->faker->sentence;

        return [
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->realText,
            'mobile'       => $this->faker->regexify('/^(9)[0-9]{9}$/'),
            'image'        => $imagePath,
            'pictures'     => $moreImages,  // Convert array to JSON string
            'city_id'      => $city->id,  // Use the city ID
            'province_id'  => $province->id,  // Use the province ID
            'price'        => $this->faker->randomNumber(7),
            'agreement'    => $this->faker->boolean,
            'exchange'     => $this->faker->boolean,
            'category_id'  => $this->faker->randomElement($category),
            'published_at' => $this->faker->dateTime,
            'user_id'      => $this->faker->randomElement($users),
            'state'        => $this->faker->randomElement(AdvertiseStateEnum::values()),
            'slug'         => Str::slug($title),
        ];
    }
}
