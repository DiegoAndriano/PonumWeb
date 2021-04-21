<?php

namespace App\Http\Controllers;

use App\Filters\UpdateGastos;
use App\Http\Requests\GastoRequest;
use App\Models\Categoria;
use App\Models\MetodoPago;
use App\Services\CrearInvitado;
use Cknow\Money\Money;

class GastoController extends Controller
{
    public function store(GastoRequest $request)
    {
        $attrs = $request->validated();

        $precio = Money::parseByIntlLocalizedDecimal(
            str_replace(',', '.', $attrs['precio']),
            $attrs['moneda']
        );

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

    public function update(GastoRequest $request)
    {
        $attrs = $request->validated();
        dd("HOla");
        $precio = Money::parseByIntlLocalizedDecimal(
            str_replace(',', '.', $attrs['precio']),
            $attrs['moneda']
        );

//        $this->authorize('update', );

    }
}
