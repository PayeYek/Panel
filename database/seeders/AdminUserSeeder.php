<?php

namespace Database\Seeders;

use App\Enum\GenderTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name'        => 'Super',
                'last_name'         => 'Admin',
                'gender'            => GenderTypeEnum::OTHER,
                'email'             => 'admin@paye1.com',
                'mobile'            => '9121111111',
                'ssn'               => '1234567890',
                'certified'         => true,
                'state'             => 1,
                'email_verified_at' => Carbon::now(),
            ],
        ];
        DB::table('users')->insert($data);

    }
}
