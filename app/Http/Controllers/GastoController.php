<?php

namespace App\Http\Controllers;

use App\Filters\UpdateGastos;
use App\Models\Categoria;
use App\Models\MetodoPago;
use App\Services\CrearInvitado;
use Cknow\Money\Money;

class GastoController extends Controller
{
    public function store()
    {
        $categorias = Categoria::all()->pluck('nombre');
        $metodos_pago = MetodoPago::all()->pluck('nombre');

        $attrs = request()->validate([
            'nombre' => 'required|min:3',
            'precio' => 'required',
            'moneda' => 'required|max:3',
            'fecha' => 'nullable|date',
            'categoria' => 'nullable|in:' . implode($categorias->toArray()),
            'metodo_pago' => 'nullable|in:' . implode($metodos_pago->toArray()), //tiene que estar en la lista de metodos de pago.
        ]);

        $precio_preparse = str_replace(',', '.', $attrs['precio']);
        $precio = Money::parseByIntlLocalizedDecimal($precio_preparse, $attrs['moneda']);

        if (auth()->guest()) {
            CrearInvitado::perform();
        }

        auth()->user()->gastos()->create([
            'nombre' => $attrs['nombre'],
            'precio' => $precio->getCurrency() . $precio->getAmount(),
        ]);

        $updateGastos = new UpdateGastos($attrs);
        $updateGastos->apply();

        return view('home');
    }
}
