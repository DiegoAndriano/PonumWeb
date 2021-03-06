<?php

namespace App\Services;

use App\Models\Invitado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CrearInvitado extends Servicio{

    function handle()
    {
        $invitado = Invitado::create([
            'passcode' => Hash::make(Str::random(16)),
        ]);

        Auth::guard()->login($invitado, true);
    }
}
