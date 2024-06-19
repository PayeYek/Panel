<?php

namespace Database\Seeders;

use App\Enum\GenderTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name'        => 'Amin',
                'last_name'         => 'Sheykhi',
                'gender'            => GenderTypeEnum::MALE,
                'email'             => 'isheykhi@gmail.com',
                'mobile'            => '9356402287',
                'ssn'               => '1931045194',
                'certified'         => true,
                'state'             => 1,
                'email_verified_at' => Carbon::now(),
            ],
        ];
        DB::table('users')->insert($data);

    }
}
