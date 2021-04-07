<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosInvitadosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_nuevo_gasto_crea_un_nuevo_invitado_y_se_loguea_como_el()
    {
        $attrs = [
            'nombre' => 'Super chino',
            'precio' => '12,99',
            'moneda' => 'ARS',
        ];

        $this->post('/', $attrs)->assertOk();

        $this->assertDatabaseHas('invitados', ['id' => 1]);

        $this->assertEquals(1, auth()->id());
    }


    /** @test */
    public function un_nuevo_gasto_con_invitado_creado_no_crea_un_nuevo_invitado()
    {
        $attrs = [
            'nombre' => 'Super chino',
            'precio' => '12,99',
            'moneda' => 'ARS',
        ];

        $this->post('/', $attrs)->assertOk();

        $this->assertDatabaseHas('invitados', ['id' => 1]);
        $this->assertEquals(1, auth()->id());

        $this->post('/', $attrs)->assertOk();
        $this->assertDatabaseMissing('invitados', ['id' => 2]);
    }

    /** @test */
    public function un_gasto_debe_tener_nombre()
    {

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '12,99',
            'moneda' => 'ARS',
        ];

        $this->post('/', $attrs);

        $this->assertDatabaseHas('gastos', ['nombre' => 'Supermercado']);

        $attrs = [
            'nombre' => 'as'
        ];

        $response = $this->post('/', $attrs);
        $response->assertSessionHasErrors('nombre');
        $this->assertDatabaseMissing('gastos', $attrs);

    }

    /** @test */
    public function un_gasto_debe_tener_precio()
    {
        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '12,99',
            'moneda' => 'ARS',
        ];

        $this->post('/', $attrs);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => 'ARS1299' //parseo de float a Money
        ];

        $this->assertDatabaseHas('gastos', $attrs);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => ''
        ];

        $response = $this->post('/', $attrs);
        $response->assertSessionHasErrors('precio');
        $this->assertDatabaseMissing('gastos', $attrs);
    }

    /** @test */
    public function un_gasto_puede_tener_un_tipo_de_moneda()
    {
        $this->withoutExceptionHandling();
        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '10,99',
            'moneda' => 'ARS',
        ];

        $this->post('/', $attrs);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '15,99',
            'moneda' => 'USD',
        ];

        $this->post('/', $attrs);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '12,99',
            'moneda' => 'EUR',
        ];

        $this->post('/', $attrs);

        $this->assertEquals(auth()->user()->gastos()->whereId(1)->first()->precio, 'ARS1099');
        $this->assertEquals(auth()->user()->gastos()->whereId(2)->first()->precio, 'USD1599');
        $this->assertEquals(auth()->user()->gastos()->whereId(3)->first()->precio, 'EUR1299');
    }

    //invariable por un período de tiempo: ej: alquiler / expensas / suscripciones
    /** @test */
    public function un_gasto_puede_ser_fijo()
    {
        // tipogasto
    }

    //varía mes a mes, pero viene indefectiblemente: ej: servicio
    /** @test */
    public function un_gasto_puede_ser_semifijo()
    {
        // tipogasto
    }

    /** @test */
    public function un_gasto_puede_tener_una_fecha_distinta_a_la_del_dia_de_anotado()
    {
        //
    }

}
