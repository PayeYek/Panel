<?php

namespace App\Facades\Sms;

use Illuminate\Support\Facades\Facade;

/**
 * Class Cart
 * @package App\Facades\Cart
 * @method static array|null confirm($mobile= "", $code = "");
 * @method static array code($mobile, $code = "");
 * @method static string|null sendCode($mobile, $code);
 * @method static string|null paid($tokenPay);
 * @method static string|null post($phone, $token);
 * @method static string|null gift($phone, $token);
 * @method static string|null notifyPaid();
 */
class Sms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Sms';
    }

}
