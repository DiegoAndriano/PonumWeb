<?php

namespace Tests\Feature;

use App\Models\TipoGasto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosTipoGastoTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function un_gasto_puede_tener_un_tipo_de_gasto()
    {
        $this->withoutExceptionHandling();

        TipoGasto::create([
            'nombre' => 'Fijo',
        ]);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '10,99',
            'moneda' => 'ARS',
            'categoria' => null,
            'metodo_pago' => null,
            'tipo_gasto' => 'Fijo',
        ];

        $tipo_gasto = TipoGasto::whereNombre('Fijo')->first();

        $this->post('/', $attrs);

        $this->assertDatabaseHas('gastos', ['tipo_gasto_id' => $tipo_gasto->id]);

    }

}
