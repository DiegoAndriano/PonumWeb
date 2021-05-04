<?php

namespace Tests\Feature;

use App\Models\Gasto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_gasto_no_puede_ser_modificado_por_alguien_que_no_es_el_dueño()
    {
        $this->seed();
        Gasto::factory()->categorizado()->create();

        $this->signIn();

        $attrs = [
            'nombre' => 'Hax\'d',
            'precio' => '$1',
            'moneda' => 'ARS',
        ];

        $this->patch('/gasto/1', $attrs)->assertForbidden();

        $this->assertDatabaseMissing('gastos', ['nombre' => 'Hax\'d']);
    }

    /** @test */
    public function un_gasto_puede_ser_modificado()
    {
        $this->seed();

        $this->signInAsInvitado();

        $attrs = [
            'nombre' => 'Coca Cola',
            'precio' => '$180',
            'moneda' => 'ARS',
        ];

        auth()->user()->gastos()->create($attrs);

        $attrs = [
            'nombre' => 'CocaCola',
            'precio' => '185',
            'moneda' => 'ARS',
            'fecha' => '05-02-2021',
            'categoria' => 'Supermercado',
            'metodo_pago' => 'Debito',
        ];

        $this->patch('/gasto/1', $attrs);

        $attrs = [
            'nombre' => 'CocaCola',
            'precio' => 'ARS18500',
            'categoria_id' => '26',
            'metodo_pago_id' => '1',
        ];

        $this->assertDatabaseHas('gastos', $attrs);
        $fecha = auth()->user()->gastos()->latest()->first()->comprado_at->year . '-' . auth()->user()->gastos()->latest()->first()->comprado_at->month . '-' . auth()->user()->gastos()->latest()->first()->comprado_at->day;
        $this->assertEquals('2021-2-5', $fecha);
    }

    /** @test */
    public function un_gasto_puede_ser_borrado()
    {
        $this->signInAsInvitado();

        $gasto = Gasto::factory()->create(['invitado_id' => auth()->id()]);

        $this->delete('/gasto/1');

        $this->assertDatabaseMissing('gastos', ['id' => $gasto->id]);

    }

    /** @test */
    public function un_gasto_no_puede_ser_borrado_por_alguien_que_no_es_el_dueño()
    {
        $this->seed();

        $gasto = Gasto::factory()->categorizado()->create();

        $this->signIn();

        $this->delete('/gasto/1')->assertForbidden();

        $this->assertDatabaseHas('gastos', ['id' => $gasto->id]);
    }
}
