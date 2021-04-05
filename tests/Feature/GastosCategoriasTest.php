<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosCategoriasTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function un_gasto_puede_tener_una_categoria()
    {
//        $attrs = [
//            'nombre' => 'Supermercado',
//            'precio' => '10,99',
//            'moneda' => 'ARS',
//            'categoria' => 'Supermercado',
//        ];
//
//        $this->post('/', $attrs);
//
//        $this->assertDatabaseHas('gastos', ['categoria' => 'Supermercado']);
    }
}
