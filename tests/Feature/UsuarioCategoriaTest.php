<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UsuarioCategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_crear_una_categoria_local()
    {
        $this->signIn();

        $this->seed();

        auth()->user()->assignRole('usuario');

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
