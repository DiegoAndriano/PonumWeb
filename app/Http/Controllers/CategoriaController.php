<?php

namespace App\Http\Controllers;

class CategoriaController extends Controller
{
    public function store()
    {
//        dd(auth()->user()->hasPermissionTo('crear categorias'));
        $this->authorize('store', auth()->user());
        dd("Hola");
    }
}
