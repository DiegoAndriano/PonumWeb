<?php

namespace App\Policies;

use App\Models\Gasto;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GastoPolicy
{
    use HandlesAuthorization;

    /**
     * puede ser usuario o invitado
     * @param Authenticatable $userOInvitado
     * @param Gasto $gasto
     * @return bool
     */
    public function update(Authenticatable $userOInvitado, Gasto $gasto): bool
    {
        return $userOInvitado->is($gasto->usuario()->first()) || $userOInvitado->is($gasto->invitado()->first());
    }
}
