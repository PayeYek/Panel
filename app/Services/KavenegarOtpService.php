<?php

namespace App\Services;

use App\Models\ActiveCode;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Random\RandomException;

class KavenegarOtpService implements OtpServiceInterface
{
    protected mixed $apiUrl;
    protected mixed $apiKey;
    protected mixed $template;

    public function __construct()
    {
        $this->apiUrl = config('services.kavenegar.api_url');
        $this->apiKey = config('services.kavenegar.api_key');
        $this->template = config('services.kavenegar.template');
    }

    public function sendOtp(string $mobile, string $otp): bool
    {
        $appEnv = config('app.env');
        if ($appEnv == 'local') {
            return true;
        }

        $url = "{$this->apiUrl}{$this->apiKey}/verify/lookup.json";
        $response = Http::asForm()->post($url, [
            'receptor' => $mobile,
            'token'    => $otp,
            'template' => $this->template,
        ]);

        if ($response->successful()) {
            /* todo for redis */
            //$otpRequestsKey = 'otp_request_' . $mobile;
            //Cache::increment($otpRequestsKey);
            //Cache::put($otpRequestsKey, Cache::get($otpRequestsKey, 1), now()->addMinutes(config('services.otp.resend_delay'))); // Restrict for 2 minutes
            return true;
        }
        return false;
    }

    /**
     * @throws RandomException
     */
    public function generateOtp(string $mobile): string
    {
        $otp = random_int(1111, 4444);

        ActiveCode::updateOrCreate(
            ['mobile' => $mobile],
            ['code' => $otp, 'expired_at' => now()->addMinutes(5)]
        );

        Cache::put('otp_' . $mobile, $otp, now()->addMinutes(config('services.otp.expire_time'))); // OTP expires in 5 minutes
        return $otp;
    }

    public function verifyOtp(string $mobile, string $otp): bool
    {
        return Cache::get('otp_' . $mobile) == $otp;
    }
}
