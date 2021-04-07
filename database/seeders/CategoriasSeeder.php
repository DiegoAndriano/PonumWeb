<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Supermercado'
        ]);
        Categoria::create([
            'nombre' => 'Alquiler'
        ]);
        Categoria::create([
            'nombre' => 'Suscripción'
        ]);
        Categoria::create([
            'nombre' => 'Otros'
        ]);
        Categoria::create([
            'nombre' => 'Luz'
        ]);
        Categoria::create([
            'nombre' => 'Agua'
        ]);
        Categoria::create([
            'nombre' => 'Electricidad'
        ]);
        Categoria::create([
            'nombre' => 'Gas'
        ]);
        Categoria::create([
            'nombre' => 'Inversión'
        ]);
        Categoria::create([
            'nombre' => 'Expensas'
        ]);
        Categoria::create([
            'nombre' => 'Verdulería'
        ]);
        Categoria::create([
            'nombre' => 'Fiambrería'
        ]);
        Categoria::create([
            'nombre' => 'Librería'
        ]);
        Categoria::create([
            'nombre' => 'Bar'
        ]);
        Categoria::create([
            'nombre' => 'Licorería'
        ]);
        Categoria::create([
            'nombre' => 'Restaurante'
        ]);
        Categoria::create([
            'nombre' => 'Mercado Libre'
        ]);
        Categoria::create([
            'nombre' => 'Pedido de comida'
        ]);
        Categoria::create([
            'nombre' => 'Almacén'
        ]);
        Categoria::create([
            'nombre' => 'Servicios'
        ]);
        Categoria::create([
            'nombre' => 'PedidosYa'
        ]);
        Categoria::create([
            'nombre' => 'Rappi'
        ]);
        Categoria::create([
            'nombre' => 'Glovo'
        ]);
        Categoria::create([
            'nombre' => 'Hogar'
        ]);
        Categoria::create([
            'nombre' => 'Reparaciones'
        ]);
    }
}
