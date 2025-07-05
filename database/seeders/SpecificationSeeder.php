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
            ['id' => 1, 'required' => false, 'title' => 'محور', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 2, 'required' => false, 'title' => 'گیربکس', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 3, 'required' => false, 'title' => 'نوع سوخت', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 4, 'required' => false, 'title' => 'کابین', 'type' => SpecificationTypeEnum::SELECT],

            ['id' => 5, 'required' => false, 'title' => 'تناژ', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 6, 'required' => false, 'title' => 'سابقه تعمیر', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 7, 'required' => false, 'title' => 'کیلومتر کارکرد', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 8, 'required' => false, 'title' => 'تعداد جابجایی سند', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 9, 'required' => false, 'title' => 'سال ساخت', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 10, 'required' => false, 'title' => 'وضعیت لاستیک', 'type' => SpecificationTypeEnum::INPUT_TEXT],

            ['id' => 11, 'required' => false, 'title' => 'منطقه آزاد', 'type' => SpecificationTypeEnum::SELECT],
        ];

        DB::table('specifications')->insert($data);
    }
}
