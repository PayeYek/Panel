<?php

namespace App\Listeners;

use App\Events\AdPublished;
use App\Jobs\SendAdPublishedSmsJob;
use App\Models\Notice;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAdPublishedSMS implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(AdPublished $event): void
    {
        $ad = $event->ad;

        // Retrieve notices that match the criteria
        $notices = Notice::where('category_id', $ad->category_id)
            ->where('province_id', $ad->province_id)
            ->where('min_price', '<=', $ad->price)
            ->where('max_price', '>=', $ad->price)
            ->where('status', 1)
            ->where(function ($query) use ($ad) {
                $query->whereNull('expired_at')
                    ->orWhere('expired_at', '>', now());
            })
            ->get();

        // Filter out duplicate notices
        $uniqueNotices = $notices->unique(function ($item) {
            return $item->user_id . '-' . $item->category_id . '-' . $item->province_id . '-' . $item->min_price . '-' . $item->max_price;
        })->values();


        dump($uniqueNotices->toArray(), $notices->toArray());

        // Send SMS to each unique user
        foreach ($uniqueNotices as $notice) {
            $user = $notice->user;

//             $this->sendSms($user->mobile, $ad->category->title, $ad->id);

            // Dispatch the job to the queue
             SendAdPublishedSmsJob::dispatch($user->mobile, $ad->category->title, $ad->id);
        }

    }

    protected function sendSms(string $mobile, string $category, int $adId)
    {
//        $link = "https://api.kavenegar.com/v1/" . env('KAVEHNEGAR_API_KEY') . "/verify/lookup.json?receptor=" . $mobile . "&token20=" . $category . "&token=" . $adId . "&template=AdPublished";
//        return @file_get_contents($link);

        // Retrieve the API key from environment variables
        $apiKey = env('KAVEHNEGAR_API_KEY');

        // Create the URL for the Kavenegar API request
        $url = "https://api.kavenegar.com/v1/" . $apiKey . "/verify/lookup.json";

        // Prepare the request parameters
        $params = [
            'receptor' => $mobile,
            'token20'    => $category,
            'token'   => $adId,
            'template' => 'AdPublished'
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
                // Log the successful response
                // Log::info('SMS sent successfully.', ['mobile' => $mobile, 'category' => $category, 'adId' => $adId]);
                return true;
            } else {
                // Log the error response
                // Log::error('Failed to send SMS.', ['response' => $responseBody]);
                return false;
            }
        } catch (\Exception $e) {
            // Log the exception
            // Log::error('Exception occurred while sending SMS.', ['exception' => $e->getMessage()]);
            return false;
        }
    }
}
