<?php

namespace App\Providers;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InvitadoCreoCuenta
{
    use Dispatchable, SerializesModels;

    public $user;
    public $invitado_id;

    /**
     * Create a new event instance.
     *
     * @param $invitado_id
     * @param $user
     */
    public function __construct($invitado_id, $user)
    {
        $this->invitado_id = $invitado_id;
        $this->user = $user;
    }
}
