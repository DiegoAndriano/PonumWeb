<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Services\CrearInvitado;
use Cknow\Money\Money;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function store()
    {
        $attrs = request()->validate([
            'nombre' => 'required|min:3',
            'precio' => 'required',
            'moneda' => 'required|max:3',
            'categoria' => 'nullable',
        ]);

        $precio_preparse = str_replace(',', '.', $attrs['precio']);
        $precio = Money::parseByIntlLocalizedDecimal($precio_preparse, $attrs['moneda']);

        if(auth()->guest()){
            CrearInvitado::perform();
        }

        auth()->user()->gastos()->create([
            'nombre' => $attrs['nombre'],
            'precio' => $precio->getCurrency() . $precio->getAmount(),
            'categoria' => $attrs['categoria'],
        ]);

        return view('home');
    }
}
