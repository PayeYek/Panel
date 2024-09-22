<?php

namespace App\Providers;

use App\Events\AdPublished;
use App\Events\DailyPricePublished;
use App\Listeners\SendAdPublishedSMS;
use App\Listeners\SendDailyPricePublishedSMS;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class  => [
            SendEmailVerificationNotification::class,
        ],
        AdPublished::class => [
            SendAdPublishedSMS::class,
        ],
        DailyPricePublished::class => [
            SendDailyPricePublishedSMS::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
