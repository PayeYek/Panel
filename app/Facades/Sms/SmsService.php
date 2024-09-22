<?php

namespace App\Facades\Sms;


use App\Models\ActiveCode;
use App\Models\User;


class SmsService
{
    public static function code($mobile, $code = ""): array
    {
        /* Generated Code */
        if (empty($code)) {
            $code = rand(1000, 9999);
        }

        ActiveCode::create([
            'code' => $code, 'expired_at' => now()->addMinutes(10)
        ]);

        /* Send Active Code */
        $data = self::sendCode($mobile, $code);
        return ['code' => $code, 'data' => $data];
    }

    public static function confirm($mobile = "", $code = ""): array|null
    {
        /* Check User */
        if (empty($mobile)) return null;

        /* Get User */
        $user = User::wherePhone($mobile)->first();

        /* Check the status of the last SMS */
        $lastRecord = $user->activeCode()->orderby('id', 'desc')->orderby('created_at', 'desc')->first();
        if ($lastRecord && $lastRecord['expired_at'] > now()) return null;

        /* Generated Code */
        if (empty($code)) {
            $code = rand(1000, 9999);
        }

        /* Save Record */
        $user->activeCode()->create([
            'code' => $code, 'expired_at' => now()->addMinutes(10)
        ]);

        /* Send Active Code */
        $data = self::sendCode($mobile, $code);

        return ['code' => $code, 'data' => $data];
    }

    public static function sendCode(string $mobile, string $code): bool|string|null
    {
        $link = "https://api.kavenegar.com/v1/" . env('KAVEHNEGAR_API_KEY') . "/verify/lookup.json?receptor=" . $mobile . "&token=" . $code . "&template=verify";
        return @file_get_contents($link);
    }
}
