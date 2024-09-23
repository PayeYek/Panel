<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'none', 'title' => 'بدون رنگ'],
            ['name' => 'multi', 'title' => 'چند رنگ'],
            ['name' => 'black', 'title' => 'سیاه'],
            ['name' => 'white', 'title' => 'سفید'],
            ['name' => 'red', 'title' => 'قرمز'],
            ['name' => 'orange', 'title' => 'نارنجی'],
            ['name' => 'amber', 'title' => 'کهربایی'],
            ['name' => 'yellow', 'title' => 'زرد'],
            ['name' => 'lime', 'title' => 'لیمویی'],
            ['name' => 'green', 'title' => 'سبز'],
            ['name' => 'emerald', 'title' => 'زمرد'],
            ['name' => 'teal', 'title' => 'سبز آبی'],
            ['name' => 'cyan', 'title' => 'فیروزه ای'],
            ['name' => 'sky', 'title' => 'آسمانی'],
            ['name' => 'blue', 'title' => 'آبی'],
            ['name' => 'indigo', 'title' => 'نیلی'],
            ['name' => 'violet', 'title' => 'بنفش'],
            ['name' => 'purple', 'title' => 'ارغوانی'],
            ['name' => 'fuchsia', 'title' => 'سرخابی'],
            ['name' => 'pink', 'title' => 'صورتی'],
            ['name' => 'rose', 'title' => 'گلی'],
            ['name' => 'slate', 'title' => 'زغالی'],
            ['name' => 'gray', 'title' => 'خاکستری'],
            ['name' => 'zinc', 'title' => 'فلزی'],
            ['name' => 'neutral', 'title' => 'خنثی'],
            ['name' => 'stone', 'title' => 'سنگ'],
        ];

        DB::table('colors')->insert($data);
    }
}
