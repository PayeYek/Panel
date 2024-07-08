<?php

namespace App\Listeners;

use App\Events\DailyPricePublished;
use App\Jobs\SendDailyPricePublishedSmsJob;
use App\Models\Notice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendDailyPricePublishedSMS implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(DailyPricePublished $event): void
    {
        $dailyPrice = $event->priceList;

        // Retrieve notices that match the criteria
        $notices = Notice::where('category_id', $dailyPrice->category_id)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->get();

        // Filter out duplicate notices
        $uniqueNotices = $notices->unique(function ($item) {
            return $item->user_id . '-' . $item->category_id;
        })->values();

        // Send SMS to each unique user
        foreach ($uniqueNotices as $notice) {
            $user = $notice->user;

            // Dispatch the job to the queue
            SendDailyPricePublishedSmsJob::dispatch(
                $user->mobile, $dailyPrice->category->title,
                $dailyPrice->product_name, $dailyPrice->price
            );
        }
    }
}
