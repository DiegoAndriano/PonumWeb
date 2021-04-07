<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Gasto;
use App\Models\MetodoPago;
use App\Models\TipoGasto;
use App\Services\CrearInvitado;
use Carbon\Carbon;
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
            'fecha' => 'nullable|date',
            'categoria' => 'nullable', //tiene que estar en la lista de categorias.
            'metodo_pago' => 'nullable', //tiene que estar en la lista de metodos de pago.
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

        if (array_key_exists('categoria', $attrs)) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->categorias()
                ->associate(Categoria::whereNombre($attrs['categoria'])->first())->save();
        }

        if (array_key_exists('tipo_gasto', $attrs)) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->tipo_gasto()
                ->associate(TipoGasto::whereNombre($attrs['tipo_gasto'])->first())->save();
        }

        if (array_key_exists('metodo_pago', $attrs)) {
            auth()
                ->user()
                ->gastos()
                ->latest()
                ->first()
                ->metodo_pago()
                ->associate(MetodoPago::whereNombre($attrs['metodo_pago'])->first())->save();
        }

        if (array_key_exists('fecha', $attrs)) {

            $fecha = Carbon::parse($attrs['fecha'])
                ->toDateTime()
                ->format('Y-m-d H:i:s');

            auth()->user()->gastos()->latest()->first()->update([
                'updated_at' => $fecha
            ]);
        }

        return view('home');
    }
}
