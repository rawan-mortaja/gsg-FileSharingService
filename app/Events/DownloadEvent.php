<?php

namespace App\Events;

use App\Models\FileDownload;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DownloadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $file_id;
    public $time;
    public $ip_address;
    public $user_agent;
    public $country ;
    public function __construct($file_id , $ip_address , $user_agent , $country)
    {
        $this->file_id = $file_id;
        $this->ip_address = $ip_address;
        $this->user_agent = $user_agent;
        $this->country = $country;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    public function boradcastWith()
    {
        return [
            'file_id' => $this->file_id,
            'time' => now(),
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'country' => $this->country,
        ];
    }
}
