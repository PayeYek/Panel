<?php

namespace App\Console\Commands;

use App\Enum\AdvertiseStateEnum;
use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeExpiredAdsState extends Command
{
    protected $signature = 'ad:expire';

    protected $description = 'Change expired ads state.';

    public function handle(): void
    {
        $ads = Ad::approved()->get();
        $ads->map(function ($ad) {
            if ($ad->published_at && Carbon::parse($ad->published_at)->diffInMonths(Carbon::now()) >= 1) {
                $ad->state = AdvertiseStateEnum::EXPIRED;
                $ad->save();
            }
        });
    }
}
