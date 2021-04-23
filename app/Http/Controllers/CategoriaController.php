<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function store()
    {
        $this->authorize('store', Categoria::class);

        $attrs = request()->validate([
           "nombre" => 'required|max:25|min:3|unique:categorias|string',
           "local" => 'required|boolean',
        ]);

        $tag = Str::of($attrs['nombre'])
            ->upper()
            ->replace(' ', '_')
            ->replace('á', 'A')
            ->replace('Á', 'A')
            ->replace('é', 'E')
            ->replace('É', 'E')
            ->replace('í', 'I')
            ->replace('Í', 'I')
            ->replace('ó', 'O')
            ->replace('Ó', 'O')
            ->replace('ú', 'U')
            ->replace('Ú', 'U');

        Categoria::create([
            'nombre' => $attrs['nombre'],
            'local' => $attrs['local'],
            'tag' => $tag,
        ]);

        return view('home');
    }
}
