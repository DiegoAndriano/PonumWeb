<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Gasto;
use App\Models\MetodoPago;
use App\Models\TipoGasto;
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
            'categoria' => 'nullable', //tiene que estar en la lista de categorias.
            'tipo_gasto' => 'nullable', //tiene que estar en la lista de tipos de gastos.
            'metodo_pago' => 'nullable', //tiene que estar en la lista de tipos de gastos.
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

        if ($attrs['categoria']) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->categorias()
                ->associate(Categoria::whereNombre($attrs['categoria'])->first())->save();
        }

        if ($attrs['tipo_gasto']) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->tipo_gasto()
                ->associate(TipoGasto::whereNombre($attrs['tipo_gasto'])->first())->save();
        }

        if ($attrs['metodo_pago']) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->metodo_pago()
                ->associate(MetodoPago::whereNombre($attrs['metodo_pago'])->first())->save();
        }

        return view('home');
    }
}
