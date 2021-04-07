<?php

namespace App\Policies;

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
     * @param $user
     * @param $categoria
     * @return mixed
     */
    public function store($user, $categoria)
    {
        dd("Hola");
        if ($user->can('crear categorias')) {
            return true;
        }
        return false;
    }
}
