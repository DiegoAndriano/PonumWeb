<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvitadoCategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_invitado_no_puede_crear_una_categoria()
    {
        $this->signInAsInvitado();

        $attrs = [
          'nombre' => 'Mi categoría personalizada',
        ];

        $this->followingRedirects()->post('/categorias', $attrs)->assertForbidden();
    }
}
