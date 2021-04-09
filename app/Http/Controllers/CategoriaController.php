<?php

namespace App\Http\Controllers;

class CategoriaController extends Controller
{
    public function store()
    {
        $this->authorize('store', auth()->user());
    }
}
