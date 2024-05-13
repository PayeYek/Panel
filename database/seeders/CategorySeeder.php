<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'خودرو', 'parent_id' => null],

            ['title' => 'خودروهای سنگین', 'parent_id' => 1], // parent
            ['title' => 'کامیون', 'parent_id' => 2],
            ['title' => 'کامیونت', 'parent_id' => 2],
            ['title' => 'کشنده', 'parent_id' => 2],
            ['title' => 'کمپرسی', 'parent_id' => 2],
            ['title' => 'کمرشکن', 'parent_id' => 2],

            ['title' => 'تریلر', 'parent_id' => 1], // parent
            ['title' => 'تریلر کفی', 'parent_id' => 8],
            ['title' => 'تریلر تیغه', 'parent_id' => 8],
            ['title' => 'تریلر چادری', 'parent_id' => 8],
            ['title' => 'تریلر کمپرسی', 'parent_id' => 8],
            ['title' => 'تریلر یخچالی', 'parent_id' => 8],
            ['title' => 'تریلر آتش نشانی', 'parent_id' => 8],
            ['title' => 'تریلر ایزوله', 'parent_id' => 8],
            ['title' => 'تریلر حمل زباله', 'parent_id' => 8],
            ['title' => 'تریلر مسقف', 'parent_id' => 8],
            ['title' => 'تریلر باری', 'parent_id' => 8],
            ['title' => 'تریلر حمل خودرو', 'parent_id' => 8],
            ['title' => 'تریلر مشبک', 'parent_id' => 8],
            ['title' => 'تانکر', 'parent_id' => 8],
            ['title' => ' بالابر', 'parent_id' => 8],
            ['title' => 'تیغه تانکر', 'parent_id' => 8],
            ['title' => 'تانکر قیر', 'parent_id' => 8],

            ['title' => 'اتوبوس و مینی بوس', 'parent_id' => 1], //parent
            ['title' => 'اتوبوس شهری', 'parent_id' => 27],
            ['title' => 'اتوبوس بین شهری', 'parent_id' => 27],
            ['title' => 'مینی‌بوس', 'parent_id' => 27],
            ['title' => 'ون', 'parent_id' => 27],
            ['title' => 'کاروان', 'parent_id' => 27],

            ['title' => 'ماشین آلات صنعتی', 'parent_id' => 1], //parent
            ['title' => 'ریچتراک', 'parent_id' => 33],
            ['title' => 'لیفتراک', 'parent_id' => 33],
            ['title' => 'استاکر', 'parent_id' => 33],
            ['title' => 'جک پالت', 'parent_id' => 33],
            ['title' => 'پالت تراک', 'parent_id' => 33],
            ['title' => 'بالابر', 'parent_id' => 33],
            ['title' => 'بیل مکانیکی', 'parent_id' => 33],
            ['title' => 'بولدوزر', 'parent_id' => 33],
            ['title' => 'لودر', 'parent_id' => 33],
            ['title' => 'جرثقیل', 'parent_id' => 33],
            ['title' => 'گریدر', 'parent_id' => 33],

            ['title' => 'ماشین آلات راه و ساختمان', 'parent_id' => 1], //parent
            ['title' => 'تراکتور', 'parent_id' => 45],
            ['title' => 'بولدوزر', 'parent_id' => 45],
            ['title' => 'بیل مکانیکی', 'parent_id' => 45],
            ['title' => 'جرثقیل', 'parent_id' => 45],
            ['title' => 'اسکریپر', 'parent_id' => 45],
            ['title' => 'لودر', 'parent_id' => 45],
            ['title' => 'کامیون', 'parent_id' => 45],
            ['title' => 'گریدر', 'parent_id' => 45],
            ['title' => 'غلتک', 'parent_id' => 45],
            ['title' => 'بکهو لودر', 'parent_id' => 45],
            ['title' => 'فینیشر آسفالت', 'parent_id' => 45],
            ['title' => 'ماشین قیرپاش', 'parent_id' => 45],
            ['title' => 'خندق کن (ترنچر)', 'parent_id' => 45],
            ['title' => 'اسکریپر', 'parent_id' => 45],
            ['title' => 'بابکت', 'parent_id' => 45],
            ['title' => 'تراک میکسر', 'parent_id' => 45],
            ['title' => 'پمپ بتن', 'parent_id' => 45],
            ['title' => 'ویبراتور', 'parent_id' => 45],

            ['title' => 'ماشین آلات آسفالت', 'parent_id' => 1], //parent
            ['title' => 'آسفالت تراش', 'parent_id' => 64],
            ['title' => 'انواع غلتک', 'parent_id' => 64],
            ['title' => 'فینیشر', 'parent_id' => 64],
            ['title' => 'کاتر', 'parent_id' => 64],
            ['title' => 'کارخانه آسفالت', 'parent_id' => 64],

            ['title' => 'ماشین آلات کشاورزی', 'parent_id' => 1], //parent
            ['title' => 'تراکتور', 'parent_id' => 70],
            ['title' => 'چاپر', 'parent_id' => 70],
            ['title' => 'کمباین', 'parent_id' => 70],

            ['title' => 'ماشین آلات حفاری', 'parent_id' => 1], //parent
            ['title' => 'ترنچر', 'parent_id' => 74],
            ['title' => 'درام کاتر', 'parent_id' => 74],
            ['title' => 'رادخور حفار', 'parent_id' => 74],
            ['title' => 'لوازم و تجهیزات حفاری', 'parent_id' => 74],
            ['title' => 'ماشین آلات حفاری تونل tbm', 'parent_id' => 74],
            ['title' => 'ماشین آلات حفاری عمودی', 'parent_id' => 74],

            ['title' => 'جرثقیل و بالابر', 'parent_id' => 1],
            ['title' => 'استاکر', 'parent_id' => 81],
            ['title' => 'انواع بالابر', 'parent_id' => 81],
            ['title' => 'تاور کرین', 'parent_id' => 81],
            ['title' => 'جرثقیل بوم خشک', 'parent_id' => 81],
            ['title' => 'جرثقیل سقفی', 'parent_id' => 81],
            ['title' => 'جرثقیل کارگاهی', 'parent_id' => 81],
            ['title' => 'جرثقیل ماشینی', 'parent_id' => 81],
            ['title' => 'جک پالت', 'parent_id' => 81],
            ['title' => 'ریچ استاکر', 'parent_id' => 81],
            ['title' => 'لیفتراک', 'parent_id' => 81],

            ['title' => 'ماشین‌آلات راهسازی و معدنی', 'parent_id' => 1], //parent
            ['title' => 'بکهو لودر', 'parent_id' => 92],
            ['title' => 'بلدوزر', 'parent_id' => 92],
            ['title' => 'بیل مکانیکی زنجیری', 'parent_id' => 92],
            ['title' => 'بیل مکانیکی لاستیکی', 'parent_id' => 92],
            ['title' => 'چکش هیدرولیکی - پیکور', 'parent_id' => 92],
            ['title' => 'دامپتراک', 'parent_id' => 92],
            ['title' => 'ساید بوم', 'parent_id' => 92],
            ['title' => 'سنگ شکن', 'parent_id' => 92],
            ['title' => 'شاول', 'parent_id' => 92],
            ['title' => 'غلتک', 'parent_id' => 92],
            ['title' => 'کمپرسور', 'parent_id' => 92],
            ['title' => 'گریدر', 'parent_id' => 92],
            ['title' => 'لودر', 'parent_id' => 92],
            ['title' => 'مینی لودر', 'parent_id' => 92],
        ];

        DB::table('categories')->insert($data);

    }
}
