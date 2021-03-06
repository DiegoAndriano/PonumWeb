<?php

namespace App\Http\Controllers;

use App\Filters\UpdateGastos;
use App\Http\Requests\GastoRequest;
use App\Models\Gasto;
use App\Services\CrearInvitado;
use Cknow\Money\Money;
use Illuminate\Support\Str;

class GastoController extends Controller
{
    public function store(GastoRequest $request)
    {
        $attrs = $request->validated();

        $precio = Money::parseByIntlLocalizedDecimal(
            str_replace(',', '.', Str::of($attrs['precio'])->replace('$', '')),
            $attrs['moneda']
        );

        if (auth()->guest()) {
            CrearInvitado::perform();
        }

        $gasto = auth()->user()->gastos()->create([
            'nombre' => $attrs['nombre'],
            'precio' => $precio->getCurrency() . $precio->getAmount(),
        ]);

        $updateGastos = new UpdateGastos($attrs, $gasto);
        $updateGastos->apply();

        return redirect('home');
    }

    public function update(GastoRequest $request, Gasto $gasto)
    {
        $this->authorize('update', $gasto);

        $attrs = $request->validated();

        $precio = Money::parseByIntlLocalizedDecimal(
            str_replace(',', '.', $attrs['precio']),
            $attrs['moneda']
        );

        $gasto->update([
            'nombre' => $attrs['nombre'],
            'precio' => $precio->getCurrency() . $precio->getAmount(),
        ]);

        $updateGastos = new UpdateGastos($attrs, $gasto);
        $updateGastos->apply();

        return view('home');
    }

    public function delete(Gasto $gasto)
    {
        $this->authorize('update', $gasto);
        $gasto->delete();

        return view('home');
    }
}
