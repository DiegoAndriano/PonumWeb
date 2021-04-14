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
        Categoria::insert([
            ['nombre' => 'Supermercado'],
            ['nombre' => 'Alquiler'],
            ['nombre' => 'Suscripción'],
            ['nombre' => 'Otros'],
            ['nombre' => 'Luz'],
            ['nombre' => 'Agua'],
            ['nombre' => 'Electricidad'],
            ['nombre' => 'Gas'],
            ['nombre' => 'Inversión'],
            ['nombre' => 'Expensas'],
            ['nombre' => 'Verdulería'],
            ['nombre' => 'Fiambrería'],
            ['nombre' => 'Librería'],
            ['nombre' => 'Bar'],
            ['nombre' => 'Licorería'],
            ['nombre' => 'Restaurante'],
            ['nombre' => 'Mercado Libre'],
            ['nombre' => 'Pedido de comida'],
            ['nombre' => 'Almacén'],
            ['nombre' => 'Servicios'],
            ['nombre' => 'PedidosYa'],
            ['nombre' => 'Rappi'],
            ['nombre' => 'Glovo'],
            ['nombre' => 'Hogar'],
            ['nombre' => 'Reparaciones'],
            ['nombre' => 'Libros'],
            ['nombre' => 'Educación'],
        ]);
    }
}
