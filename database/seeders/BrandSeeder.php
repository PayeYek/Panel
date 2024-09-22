<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brands = [
            ["country_id" => 62, "name" => "Benz"],
            ["country_id" => 165, "name" => "Volvo"],
            ["country_id" => 62, "name" => "MAN"],
            ["country_id" => 165, "name" => "Scania"],
            ["country_id" => 119, "name" => "DAF"],
            ["country_id" => 80, "name" => "Iveco"],
            ["country_id" => 35, "name" => "King Long"],
            ["country_id" => 35, "name" => "Hualing Xingma"],
            ["country_id" => 35, "name" => "Great Wall Motors"],
            ["country_id" => 35, "name" => "BYD"],
            ["country_id" => 35, "name" => "Foton"],
            ["country_id" => 35, "name" => "Dongfeng"],
            ["country_id" => 35, "name" => "JAC"],
            ["country_id" => 35, "name" => "Shacmoto"],
            ["country_id" => 35, "name" => "Sinotruk"],
            ["country_id" => 76, "name" => "pilsan"],
            ["country_id" => 76, "name" => "Saipa diesel"],
            ["country_id" => 76, "name" => "Mayan"],
            ["country_id" => 62, "name" => "fuso"],
            ["country_id" => 62, "name" => "Daimler truck"],
            ["country_id" => 76, "name" => "mammut trailer"],
            ["country_id" => 35, "name" => "FAW"],
            ["country_id" => 35, "name" => "BEIJING"],
            ["country_id" => 35, "name" => "BAIC"],
            ["country_id" => 76, "name" => "BAHMAN"],
            ["country_id" => 82, "name" => "ISUZU"],
            ["country_id" => 35, "name" => "Golden Dragon"],
            ["country_id" => 76, "name" => "KARIZAN"],
            ["country_id" => 82, "name" => "HYUNDAI"],
            ["country_id" => 58, "name" => "RENAULT"],
            ["country_id" => 35, "name" => "KAMA"],
            ["country_id" => 35, "name" => "C&C"],
            ["country_id" => 140, "name" => "KAMAZ"],
            ["country_id" => 76, "name" => "AMICO"],
            ["country_id" => 35, "name" => "Chenglong Motors"],
            ["country_id" => 76, "name" => "KAMEL"],
            ["country_id" => 159, "name" => "DAEWOO TRUCKS"],
            ["country_id" => 35, "name" => "SANY"],
            ["country_id" => 165, "name" => "SCANIA"],
            ["country_id" => 35, "name" => "BEIBEN"],
            ["country_id" => 57, "name" => "SISU"],
            ["country_id" => 76, "name" => "irankhodro diesel"],
        ];

        DB::table('brands')->insert($brands);
    }
}
