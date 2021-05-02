<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CategoriaPolicy
{
    use HandlesAuthorization;

    /**
     * puede ser usuario o invitado
     * @param Authenticatable $userOInvitado
     * @return bool
     */
    public function store(Authenticatable $userOInvitado): bool
    {
        return $userOInvitado->can('crear categorias');
    }
}
