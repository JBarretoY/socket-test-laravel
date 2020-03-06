<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $to;
    public $from;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($to, $from, $message)
    {
        $this->to = [
            "id" => $to->id,
            "name" => $to->username,
        ];

        $this->from = [
            "id" => $from->id,
            "name" => $from->username,
        ];

        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['messages'];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'messages';
    }
}
