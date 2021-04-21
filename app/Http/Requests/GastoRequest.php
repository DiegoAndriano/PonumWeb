<?php

namespace App\Http\Requests;

use App\Models\Categoria;
use App\Models\MetodoPago;
use Illuminate\Foundation\Http\FormRequest;

class GastoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categorias = Categoria::all()->pluck('nombre');
        $metodos_pago = MetodoPago::all()->pluck('nombre');

        return [
            'nombre' => 'required|min:3',
            'precio' => 'required',
            'moneda' => 'required|max:3',
            'fecha' => 'nullable|date',
            'categoria' => 'nullable|in:' . implode($categorias->toArray()),
            'metodo_pago' => 'nullable|in:' . implode($metodos_pago->toArray()), //tiene que estar en la lista de metodos de pago.
        ];
    }
}
