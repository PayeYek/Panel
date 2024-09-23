<?php

namespace Database\Factories;

use App\Enum\AdvertiseStateEnum;
use App\Models\Category;
use App\Models\ProvinceCity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $file = new UploadedFile($sourcePath, 'picture.png', 'image/png', null, true);
        $storedFilePathImage = $file->store('media/ad', 'public');

        /* More image */
        $sourcePath = public_path('assets/images/empty/picture.png');
        $randomCount = $this->faker->numberBetween(1, 4);
        $storedFilePathPictures = null;
        for ($i = 0; $i < $randomCount ; $i++) {
            $file = new UploadedFile($sourcePath, 'picture.png', 'image/png', null, true);
            $storedFilePathPictures[] = $file->store('media/ad/more', 'public');
        }


        $city = ProvinceCity::inRandomOrder()->first();
        $province = $city->province;
        $category = Category::grandChildren()->get()->pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        $title = $this->faker->sentence;

        return [
            'user_id'      => $this->faker->randomElement($users),
            'category_id'  => $this->faker->randomElement($category),
            'province_id'  => $province->id,  // Use the province ID
            'city_id'      => $city->id,  // Use the city ID
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->realText,
            'mobile'       => $this->faker->regexify('/^(9)[0-9]{9}$/'),
            'image'        => $storedFilePathImage,
            'pictures'     => $storedFilePathPictures,
            'price'        => $this->faker->randomNumber(7),
            'agreement'    => $this->faker->boolean,
            'exchange'     => $this->faker->boolean,
            'published_at' => $this->faker->dateTime,
            'state'        => $this->faker->randomElement(AdvertiseStateEnum::values()),
            'slug'         => Str::slug($title),
        ];
    }
}
