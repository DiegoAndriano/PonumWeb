<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GastosCategoriasTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function un_gasto_puede_tener_una_categoria()
    {
        Categoria::create([
            'nombre' => 'Supermercado',
        ]);

        $attrs = [
            'nombre' => 'Supermercado',
            'precio' => '10,99',
            'moneda' => 'ARS',
            'categoria' => 'Supermercado',
            'tipo_gasto' => null,
            'metodo_pago' => null,
        ];

        $cat = Categoria::whereNombre('Supermercado')->first();

        $this->post('/', $attrs);

        $this->assertDatabaseHas('gastos', ['categoria_id' => $cat->id]);
    }
}
