<?php

namespace App\Services;

use InvalidArgumentException;

class OtpServiceManager
{
    protected KavenegarOtpService $service;

    public function __construct($provider)
    {
        $this->service = match ($provider) {
            'kavenegar' => new KavenegarOtpService(),
            default => throw new InvalidArgumentException("Unsupported OTP service provider: $provider"),
        };
    }

    public function getService(): OtpServiceInterface
    {
        return $this->service;
    }
}
