<?php

namespace App\Filters;

use App\Models\Categoria;
use App\Models\MetodoPago;
use Carbon\Carbon;

/**
 * Si al crear un modelo nuevo hay atributos condicionales que tienen que ser asignados al modelo en caso de existir,
 * esta clase los maneja.
 *
 */
class UpdateGastos extends IsNotNullUpdater{

    public function fecha($fecha, $gasto)
    {
        $fecha_parsed = Carbon::parse($fecha)
            ->toDateTime()
            ->format('Y-m-d H:i:s');

        $gasto->update([
            'comprado_at' => $fecha_parsed
        ]);
    }

    public function metodo_pago($metodo_pago, $gasto)
    {
        $gasto
            ->metodo_pago()
            ->associate(MetodoPago::whereNombre($metodo_pago)->first())->save();
    }

    public function categoria($categoria, $gasto)
    {
        $gasto
            ->categoria()
            ->associate(Categoria::whereNombre($categoria)->first())->save();
    }

}
