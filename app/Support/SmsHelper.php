<?php

namespace App\Support;


class SmsHelper
{
    public static function sendCode(string $mobile, string $code): bool|string|null
    {
        $link = "https://api.kavenegar.com/v1/" . env('KAVEHNEGAR_API_KEY') . "/verify/lookup.json?receptor=" . $mobile . "&token=" . $code . "&template=verify";
        return @file_get_contents($link);
    }
}
