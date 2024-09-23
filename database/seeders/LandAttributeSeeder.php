<?php

namespace Database\Seeders;

use App\Models\LandAttribute;
use Illuminate\Database\Seeder;

class LandAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'parent_id' => null, 'name' => 'ابعاد'],
            ['id' => 2, 'parent_id' => 1, 'name' => 'طول'],
            ['id' => 3, 'parent_id' => 1, 'name' => 'عرض'],
            ['id' => 4, 'parent_id' => 1, 'name' => 'ارتفاع'],
            ['id' => 5, 'parent_id' => 1, 'name' => 'وزن کل شاسی'],
            ['id' => 6, 'parent_id' => 1, 'name' => 'وزن ناخالص مجاز'],

            ['id' => 7, 'parent_id' => null, 'name' => 'موتور'],
            ['id' => 8, 'parent_id' => 7, 'name' => 'نوع موتور'],
            ['id' => 9, 'parent_id' => 7, 'name' => 'حجم موتور'],
            ['id' => 10, 'parent_id' => 7, 'name' => 'قدرت موتور'],
            ['id' => 11, 'parent_id' => 7, 'name' => 'حداکثر گشتاور'],
            ['id' => 12, 'parent_id' => 7, 'name' => 'تعداد سیلندر'],

            ['id' => 13, 'parent_id' => null, 'name' => 'دیگر ویژگی‌ها'],
            ['id' => 14, 'parent_id' => 13, 'name' => 'جک بالابر'],
            ['id' => 15, 'parent_id' => 13, 'name' => 'قابل سفارش'],
        ];
        foreach ($data as  $i){
            LandAttribute::create($i);
        }
    }
}
