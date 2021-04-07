<?php

namespace Tests;

use App\Models\Invitado;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: User::factory()->create();

        $this->actingAs($user);

        return $user;
    }

    protected function signInAsInvitado($invitado = null)
    {
        $invitado = $invitado ?: Invitado::create([
            'passcode' => Hash::make(Str::random(16)),
        ]);

        $this->actingAs($invitado);

        return $invitado;
    }
}
