<?php

namespace App\Listeners;

use App\Events\DailyPricePublished;
use App\Jobs\SendDailyPricePublishedSmsJob;
use App\Models\Notice;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendDailyPricePublishedSMS implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(DailyPricePublished $event): void
    {
        $dailyPrice = $event->priceList;

        // Retrieve notices that match the criteria
        $notices = Notice::where('category_id', $dailyPrice->category_id)
            ->where('status', 1)
//            ->where(function ($query) {
//                $query->whereNull('expired_at')
//                    ->orWhere('expired_at', '>', now());
//            })
            ->get();

        // Filter out duplicate notices
        $uniqueNotices = $notices->unique(function ($item) {
            return $item->user_id . '-' . $item->category_id;
        })->values();

        // Send SMS to each unique user
        foreach ($uniqueNotices as $notice) {
            $user = $notice->user;

            //$this->sendSms(
            //    $user->mobile, $dailyPrice->category->title,
            //    $dailyPrice->product_name, $dailyPrice->price
            //);

            // Dispatch the job to the queue
             SendDailyPricePublishedSmsJob::dispatch(
                 $user->mobile, $dailyPrice->category->title,
                 $dailyPrice->product_name, $dailyPrice->price
             );
        }
    }

    protected function sendSms(string $mobile, string $category, string $product, string $price)
    {
        // Retrieve the API key from environment variables
        $apiKey = env('KAVEHNEGAR_API_KEY');

        // Create the URL for the Kavenegar API request
        $url = "https://api.kavenegar.com/v1/" . $apiKey . "/verify/lookup.json";

        // Prepare the request parameters
        $params = [
            'receptor' => $mobile,
            'token10'    => $category,
            'token20'   => $product,
            'token'   => $price,
            'template' => 'DailyPricePublished'
        ];

        // Create a new Guzzle client
        $client = new Client();

        try {
            // Send the request
            $response = $client->get($url, ['query' => $params]);

            // Parse the response
            $responseBody = json_decode($response->getBody(), true);

            // Check if the response is successful
            if ($response->getStatusCode() == 200 && isset($responseBody['return']['status']) && $responseBody['return']['status'] == 200) {
                // Log::info('SMS sent successfully.', ['mobile' => $this->mobile, 'category' => $this->category, 'adId' => $this->adId]);
                return true;
            } else {
                // Log::error('Failed to send SMS.', ['response' => $responseBody]);
                return false;
            }

        } catch (\Exception $e) {
            Log::error('Exception occurred while sending SMS.', ['exception' => $e->getMessage()]);
            return false;
        }
    }
}
