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
            ['id' => 1, 'required' => true, 'title' => 'محور', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 2, 'required' => true, 'title' => 'گیربکس', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 3, 'required' => true, 'title' => 'نوع سوخت', 'type' => SpecificationTypeEnum::SELECT],
            ['id' => 4, 'required' => true, 'title' => 'کابین', 'type' => SpecificationTypeEnum::SELECT],

            ['id' => 5, 'required' => true, 'title' => 'تناژ', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 6, 'required' => true, 'title' => 'سابقه تعمیر', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 7, 'required' => true, 'title' => 'کیلومتر کارکرد', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 8, 'required' => true, 'title' => 'تعداد جابجایی سند', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 9, 'required' => true, 'title' => 'سال ساخت', 'type' => SpecificationTypeEnum::INPUT_TEXT],
            ['id' => 10, 'required' => true, 'title' => 'وضعیت لاستیک', 'type' => SpecificationTypeEnum::INPUT_TEXT],

            ['id' => 11, 'required' => true, 'title' => 'منطقه آزاد', 'type' => SpecificationTypeEnum::SELECT],
        ];

        DB::table('specifications')->insert($data);
    }
}
