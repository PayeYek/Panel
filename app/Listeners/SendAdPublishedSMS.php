<?php

namespace App\Listeners;

use App\Events\AdPublished;
use App\Models\Notice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAdPublishedSMS
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdPublished $event): void
    {
        $ad = $event->ad;


        // Find qualified users
        $notices = Notice::where('category_id', $ad->category_id)
            ->where('min_price', '<=', $ad->price)
            ->where('max_price', '>=', $ad->price)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->when($ad->province_id, function ($query) use ($ad) {
                return $query->whereNotNull('province_id')
                    ->where('province_id', $ad->province_id);
            })
            ->when($ad->city_id, function ($query) use ($ad) {
                return $query->whereNotNull('city_id')
                    ->where('city_id', $ad->city_id);
            })
            ->get();

        dd($ad, $notices);
        foreach ($notices as $notice) {
            $user = $notice->user;

            // Send SMS to the user
            $this->sendSms($user->mobile, "آگهی جدیدی با عنوان '{$ad->title}' در دسته‌بندی مورد علاقه شما ثبت شد.");
        }
    }

    protected function sendSms($mobile, $message)
    {

    }

}
