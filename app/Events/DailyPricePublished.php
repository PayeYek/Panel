<?php

namespace App\Events;

use App\Models\PriceList;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DailyPricePublished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $priceList;
    public function __construct(PriceList $priceList)
    {
        $this->priceList = $priceList;
    }

}
