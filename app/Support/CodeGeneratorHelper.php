<?php

namespace App\Support;


use Illuminate\Support\Facades\DB;

class CodeGeneratorHelper
{
    public static function generateTrackingCode(): string
    {
        $digits = '123456789';

        return substr(str_shuffle($digits), 0, 8);
    }

    public static function generateUniqueTrackingCode($table, $column): string
    {
        do {
            $trackingCode = self::generateTrackingCode();
        } while (DB::table($table)->where($column, $trackingCode)->exists());

        return $trackingCode;
    }
}
