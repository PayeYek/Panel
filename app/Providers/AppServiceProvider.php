<?php

namespace App\Providers;

use App\Services\OtpServiceManager;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OtpServiceManager::class, function ($app) {
            $provider = config('services.otp.provider', 'kavenegar'); // Default to 'kavenegar'
            return new OtpServiceManager($provider);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::hashClientSecrets();
//        $this->app->make(TransformerResolver::class)->bind([
//            Land::class => \App\Transformers\LandTransformer::class,
//        ]);
    }
}
