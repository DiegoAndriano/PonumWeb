<?php

namespace App\Policies;

use App\Models\Invitado;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
{
    use HandlesAuthorization;

    /**
     * puede ser usuario o invitado
     * @param Invitado $user
     * @return bool
     */
    public function store(Invitado $user): bool
    {
        dd("Hola");
        if ($user->can('crear categorias')) {
            return true;
        }
        return false;
    }
}
