<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendDailyPricePublishedSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mobile;
    protected $category;
    protected $product;
    protected $price;


    public function __construct(string $mobile, string $category, string $product, string $price)
    {
        $this->mobile = $mobile;
        $this->category = $category;
        $this->product = $product;
        $this->price = $price;
    }

    public function handle()
    {
        $apiKey = env('KAVEHNEGAR_API_KEY');
        $url = "https://api.kavenegar.com/v1/" . $apiKey . "/verify/lookup.json";
        $params = [
            'receptor' => $this->mobile,
            'token10'    => $this->category,
            'token20'   => $this->product,
            'token'   => $this->price,
            'template' => 'DailyPricePublished'
        ];

        $client = new Client();

        try {
            $response = $client->get($url, ['query' => $params]);
            //$responseBody = json_decode($response->getBody(), true);

            //if ($response->getStatusCode() == 200 && isset($responseBody['return']['status']) && $responseBody['return']['status'] == 200) {
            //    Log::info('SMS sent successfully.', ['mobile' => $this->mobile, 'category' => $this->category, 'adId' => $this->adId]);
            //} else {
            //    Log::error('Failed to send SMS.', ['response' => $responseBody]);
            //}
        } catch (\Exception $e) {
            Log::error('Exception occurred while sending SMS.', ['exception' => $e->getMessage()]);
        }
    }
}
