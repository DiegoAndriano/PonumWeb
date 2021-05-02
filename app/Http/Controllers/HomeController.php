<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'categorias' => Categoria::all()->pluck('nombre'),
            'gastos' => auth()->check() ? auth()->user()->gastos()->get() : null
        ]);
    }
}
