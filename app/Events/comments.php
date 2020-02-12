    <?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class comments implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private  $comment , $UserId ; 

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($UserId , $comment)
    {
        $this->comment = $comment ;

        $this->UserId = $UserId ; 
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new Channel('CommentsChannel');

        return new PrivateChannel('post.'.$this->UserId);
    }


    public function broadcastWith(){

    
        return [ $this->comment  ] ;
    }

    
}
