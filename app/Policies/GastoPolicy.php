<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GastoPolicy
{
    use HandlesAuthorization;

    /**
     * puede ser usuario o invitado
     * @param Authenticatable $userOInvitado
     * @return bool
     */
    public function update(Authenticatable $userOInvitado, $gasto): bool
    {
        return $userOInvitado->can('crear categorias');
    }
}
