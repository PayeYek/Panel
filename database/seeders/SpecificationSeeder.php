<?php

namespace Database\Seeders;

use App\Enum\SpecificationTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'محور', 'type' => SpecificationTypeEnum::SELECT],
            ['title' => 'گیربکس', 'type' => SpecificationTypeEnum::SELECT],
            ['title' => 'نوع سوخت', 'type' => SpecificationTypeEnum::SELECT],
            ['title' => 'کابین', 'type' => SpecificationTypeEnum::SELECT],

            ['title' => 'تناژ', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['title' => 'سابقه تعمیر', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['title' => 'کیلومتر کارکرد', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['title' => 'تعداد جابجایی سند', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['title' => 'سال ساخت', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['title' => 'وضعیت لاستیک', 'type' => SpecificationTypeEnum::INPUT_TEXT],

            ['title' => 'منطقه آزاد', 'type' => SpecificationTypeEnum::BOOLEAN],
            ['title' => 'نوع کابین', 'type' => SpecificationTypeEnum::BOOLEAN],
        ];

        DB::table('specifications')->insert($data);
    }
}
