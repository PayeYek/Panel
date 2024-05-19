<?php

namespace App\Support;


use Illuminate\Support\Facades\DB;

class CodeGeneratorHelper
{
    public static function generateTrackingCode(): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';

        $randomChars = substr(str_shuffle($characters), 0, 2);
        $randomDigits = substr(str_shuffle($digits), 0, 8);

        return $randomChars . $randomDigits;
    }

    public static function generateUniqueTrackingCode($table, $column): string
    {
        do {
            $trackingCode = self::generateTrackingCode();
        } while (DB::table($table)->where($column, $trackingCode)->exists());

        return $trackingCode;
    }
}
