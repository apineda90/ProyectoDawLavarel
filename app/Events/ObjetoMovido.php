<?php

namespace App\Events;
use App\Grafico;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ObjetoMovido extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Grafico $item)
    {
        $this->id = $item->id;
        $this->x = $item->x;
        $this->y = $item->y;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['posicion'];
    }
}
