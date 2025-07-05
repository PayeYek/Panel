<?php

namespace App\Services;

interface OtpServiceInterface
{
    public function sendOtp(string $mobile, string $otp): bool;

    public function generateOtp(string $mobile): string;

    public function verifyOtp(string $mobile, string $otp): bool;
}
