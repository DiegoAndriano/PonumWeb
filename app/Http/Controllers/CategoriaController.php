<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function store()
    {
        $this->authorize('store', [auth()->user(), Categoria::class]);
    }
}
