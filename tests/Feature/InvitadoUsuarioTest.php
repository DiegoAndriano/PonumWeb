<?php

namespace Tests\Feature;

use App\Models\Gasto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvitadoUsuarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_invitado_que_se_crea_una_cuenta_de_usuario_mantiene_todos_sus_gastos()
    {
        $this->withoutExceptionHandling();

        $this->seed();

        $attrs = [
            'nombre' => 'Super chino',
            'precio' => '12,99',
            'moneda' => 'ARS',
        ];

        $this->post('/gasto', $attrs);
        $this->post('/gasto', $attrs);

        $gasto = Gasto::first();

        $attrs = [
            'name' => 'Diego Andriano',
            'email' => 'DiegoAndriano@example.com',
            'password' => 'secretsss',
            'password_confirmation' => 'secretsss',
        ];

        $this->post('register', $attrs);
        $attrs = [
            'name' => 'Diego Andrianos',
            'email' => 'DiegoAndrianos@example.com',
            'password' => 'secretssss',
            'password_confirmation' => 'secretssss',
        ];
        $this->post('register', $attrs);
        $this->assertDatabaseMissing('users', ['name' => $attrs['name']]);
        $this->assertDatabaseHas('gastos', ['user_id' => 1]);
        $this->assertCount(2, Gasto::whereUser_id(1)->get());

    }
}
