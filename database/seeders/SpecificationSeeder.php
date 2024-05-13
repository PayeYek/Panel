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
            ['id' => 1, 'title' => 'محور', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 2, 'title' => 'گیربکس', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 3, 'title' => 'نوع سوخت', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 4, 'title' => 'کابین', 'type' => SpecificationTypeEnum::SELECT],

            ['id' => 5, 'title' => 'تناژ', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 6, 'title' => 'سابقه تعمیر', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 7, 'title' => 'کیلومتر کارکرد', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 8, 'title' => 'تعداد جابجایی سند', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 9, 'title' => 'سال ساخت', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 10, 'title' => 'وضعیت لاستیک', 'type' => SpecificationTypeEnum::INPUT_TEXT],

            ['id' => 11, 'title' => 'منطقه آزاد', 'type' => SpecificationTypeEnum::BOOLEAN],
            ['id' => 12, 'title' => 'نوع کابین', 'type' => SpecificationTypeEnum::BOOLEAN],
        ];

        DB::table('specifications')->insert($data);
    }
}
