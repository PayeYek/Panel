<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $body;
    public $dir;
    public $icon;
    public $badge;
    public $tag;
    public $image;


    public function __construct($name, $body, $dir, $icon, $badge, $tag, $image)
    {
        $this->name = $name;
        $this->body = $body;
        $this->dir = $dir;
        $this->icon = $icon;
        $this->badge = $badge;
        $this->tag = $tag;
        $this->image = $image;
    }

    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastWith()
    {
        return [
            'name'    => $this->name,
            'options' => [
                'body'  => $this->body,
                'dir'   => $this->dir,
                'icon'  => $this->icon,
                'badge' => $this->badge,
                'tag'   => $this->tag,
                'image' => $this->image,
            ],

        ];
    }
}
