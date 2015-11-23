<?php

namespace SBAnalysis\Events;

use SBAnalysis\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnviaEmailNovoUsuarioEvent extends Event
{
    use SerializesModels;
    protected $usuario;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($usuario)
    {
       $this->usuario = $usuario;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function getUsuario(){
        return $this->usuario;
    }
}
