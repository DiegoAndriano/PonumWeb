<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_gasto_no_puede_ser_modificado_por_alguien_que_no_es_el_dueño()
    {

    }

    /** @test */
    public function un_gasto_puede_ser_modificado()
    {
        $this->withoutExceptionHandling();

        $this->seed();

        $this->signInAsInvitado();

        $attrs = [
            'nombre' => 'Coca Cola',
            'precio' => '$180',
            'moneda' => 'ARS',
        ];

        auth()->user()->gastos()->create($attrs);

        $attrs = [
            'nombre' => 'Coca Cola',
            'precio' => '$185',
            'moneda' => 'ARS',
            'fecha' => '05-02-2021',
            'categoria' => 'Supermercado',
            'metodo_pago' => 'Debito',
        ];

        $this->patch('/1', $attrs);

        $attrs = [
            'nombre' => 'Coca Cola',
            'precio' => '$185',
            'moneda' => 'ARS',
            'categoria' => 'Supermercado',
            'metodo_pago' => 'Debito',
        ];

        $this->assertDatabaseHas('gastos', $attrs);
        $fecha = auth()->user()->gastos()->latest()->first()->comprado_at->year . '-' . auth()->user()->gastos()->latest()->first()->comprado_at->month . '-' . auth()->user()->gastos()->latest()->first()->comprado_at->day;
        $this->assertEquals('05-02-2021', $fecha );
    }

    /** @test */
    public function un_gasto_puede_ser_borrado()
    {

    }

}
