<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'kavenegar' => [
        'api_url'  => env('KAVEHNEGAR_API_URL', 'https://api.kavenegar.com/v1/'),
        'api_key'  => env('KAVEHNEGAR_API_KEY'),
        'template' => env('KAVEHNEGAR_TEMPLATE', 'verify'),
    ],

    'otp' => [
        'expire_time'       => env('OTP_EXPIRE_TIME', 5),
        'provider'          => env('OTP_PROVIDER', 'kavenegar'),
        'resend_delay'      => env('REQUEST_OTP_RESEND_DELAY', 2),
        'login_max_attempt' => env('LOGIN_MAX_ATTEMPTS', 3),
        'login_try_delay'   => env('LOGIN_TRY_DELAY', 2),
    ],

    'jwt' => [
        'access_token_expiration_days'  => env('JWT_ACCESS_TOKEN_EXPIRATION_DAYS', 1),
        'refresh_token_expiration_days' => env('JWT_REFRESH_TOKEN_EXPIRATION_DAYS', 5),
    ],
];
