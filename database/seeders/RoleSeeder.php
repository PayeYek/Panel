<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'       => 'super-admin',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'manager',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'moderator',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'editor',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'author',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'contributor',
                'guard_name' => 'web',
            ],
            [
                'name'       => 'subscriber',
                'guard_name' => 'web',
            ]
        ];
        DB::table('roles')->insert($data);

//    •	Super Admin: دسترسی به تمامی بخش‌ها و قابلیت‌های سایت.
//    •	Admin: مدیریت کاربران، تنظیمات اصلی سایت، و بخش‌های مهم دیگر.
//    •	Manager: مدیریت محتوای سایت، تبلیغات، و آگهی‌ها.
//    •	Moderator: نظارت بر محتوای کاربران و نظرات.
//    •	Editor: ویرایش و انتشار مقالات و محتوا.
//    •	Author: تولید و مدیریت محتوای خود.
//    •	Contributor: ارسال محتوا برای تأیید.
//    •	Subscriber: دسترسی محدود به محتوا و قابلیت‌های عمومی

    }
}
