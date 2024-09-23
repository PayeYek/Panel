<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecificationValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'title' => 'تک محور', 'specification_id' => 1],
            ['id' => 2, 'title' => 'جفت محور', 'specification_id' => 1],
            ['id' => 3, 'title' => 'سه محور', 'specification_id' => 1],
            ['id' => 4, 'title' => 'چهار محور', 'specification_id' => 1],
            ['id' => 5, 'title' => 'اتومات', 'specification_id' => 2],
            ['id' => 6, 'title' => 'دستی', 'specification_id' => 2],
            ['id' => 7, 'title' => 'نیمه اتومات', 'specification_id' => 2],
            ['id' => 8, 'title' => 'دیزل', 'specification_id' => 3],
            ['id' => 9, 'title' => 'بنزین', 'specification_id' => 3],
            ['id' => 10, 'title' => 'cng', 'specification_id' => 3],
            ['id' => 11, 'title' => 'برقی', 'specification_id' => 3],
            ['id' => 12, 'title' => 'خوابدار', 'specification_id' => 4],
            ['id' => 13, 'title' => 'بدون خواب', 'specification_id' => 4],
            ['id' => 14, 'title' => 'دارد', 'specification_id' => 11],
            ['id' => 15, 'title' => 'ندارد', 'specification_id' => 11],
        ];

        DB::table('specification_values')->insert($data);
    }
}
