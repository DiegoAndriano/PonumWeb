<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsuarioCategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_crear_una_categoria_local()
    {
        $this->seed();

        $this->signIn();

        $attrs = [
            'nombre' => 'Categoría personalizada',
            'local' => true,
        ];

        $this->post('/categorias', $attrs);

        $this->assertTrue(Categoria::whereLocal(true)->exists());

    }

    /** @test */
    public function un_usuario_puede_solicitar_que_su_categoria_local_sea_global()
    {
        $this->markTestSkipped();
    }

    /** @test */
    public function una_categoria_local_aceptada_es_integrada_globalmente()
    {
        $this->markTestSkipped();
    }
}
