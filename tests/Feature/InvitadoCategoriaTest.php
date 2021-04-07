<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class InvitadoCategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_invitado_no_puede_crear_una_categoria()
    {
        $this->withoutExceptionHandling();
//        Artisan::call('migrate');

        $this->signInAsInvitado();
        $attrs = [
          'nombre' => 'Mi categoría personalizada',
        ];

        $this->post('/categorias', $attrs)->assertUnauthorized();
    }
}
