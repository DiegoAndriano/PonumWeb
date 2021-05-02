<?php

namespace App\Http\Controllers;


use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function store()
    {
        $this->authorize('store', Categoria::class);

        $attrs = request()->validate([
           "nombre" => 'required|max:25|min:3|unique:categorias|string',
           "local" => 'required|boolean',
        ]);

        Categoria::create([
            'nombre' => $attrs['nombre'],
            'local' => $attrs['local'],
        ]);

        return view('home');
    }
}
