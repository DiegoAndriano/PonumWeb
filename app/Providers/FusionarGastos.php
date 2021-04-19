<?php

namespace App\Providers;

use App\Models\Gasto;

class FusionarGastos
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InvitadoCreoCuenta  $event
     * @return void
     */
    public function handle(InvitadoCreoCuenta $event)
    {
        $gastos = Gasto::whereInvitado_id($event->invitado_id)->get();
        $gastos->each(function($gasto) use ($event) {
            $gasto->usuario()->associate($event->user);
            $gasto->save();
        });

    }
}
