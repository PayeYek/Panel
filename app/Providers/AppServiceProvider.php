<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $this->app->make(TransformerResolver::class)->bind([
//            Land::class => \App\Transformers\LandTransformer::class,
//        ]);
    }
}
