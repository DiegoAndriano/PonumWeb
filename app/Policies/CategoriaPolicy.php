<?php

namespace App\Policies;

use App\Models\Invitado;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * puede ser usuario o invitado
     * @param Invitado $user
     * @return mixed
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
