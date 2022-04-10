<?php

namespace App\Events;

use App\Jobs\EmailJob;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $email;
    public $sub;
    public $msg;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $sub, $msg)
    {   
        $this->email = $email;
        $this->sub = $sub;
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {   $job = EmailJob::dispatch($this->email, $this->sub, $this->msg);
        return new Channel('EmailBroadcast', $job);
    }
}
