<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class InvitadoCategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_invitado_no_puede_crear_una_categoria()
    {
        $this->withoutExceptionHandling();

        $this->signInAsInvitado();

        $role = Role::create(['name' => 'invitado']);
        $permission = Permission::create(['name' => 'crear categorias']);
        $role->givePermissionTo($permission)->save();
        auth()->user()->assignRole($role);

        $attrs = [
          'nombre' => 'Mi categoría personalizada',
        ];

        $response = $this->post('/categorias', $attrs);
        $response->assertUnauthorized();
    }
}
