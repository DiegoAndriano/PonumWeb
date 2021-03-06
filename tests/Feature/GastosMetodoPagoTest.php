<?php

namespace Tests\Feature;

use App\Models\MetodoPago;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosMetodoPagoTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function un_gasto_puede_tener_un_tipo_de_gasto()
    {
        $this->withoutExceptionHandling();

        MetodoPago::create([
            'nombre' => 'Debito',
        ]);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '10,99',
            'moneda' => 'ARS',
            'metodo_pago' => 'Debito',
        ];

        $metodo_pago = MetodoPago::whereNombre('Debito')->first();

        $this->post('/gasto', $attrs);

        $this->assertDatabaseHas('gastos', ['metodo_pago_id' => $metodo_pago->id]);

    }

}
