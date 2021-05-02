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
            ['nombre' => 'Agua'],
            ['nombre' => 'Almacén'],
            ['nombre' => 'Alquiler'],
            ['nombre' => 'Bar'],
            ['nombre' => 'Educación'],
            ['nombre' => 'Electricidad'],
            ['nombre' => 'Expensas'],
            ['nombre' => 'Fiambrería'],
            ['nombre' => 'Gas'],
            ['nombre' => 'Glovo'],
            ['nombre' => 'Hogar'],
            ['nombre' => 'Inversión'],
            ['nombre' => 'Librería'],
            ['nombre' => 'Libros'],
            ['nombre' => 'Licorería'],
            ['nombre' => 'Luz'],
            ['nombre' => 'Mercado Libre'],
            ['nombre' => 'Otros'],
            ['nombre' => 'Pedido de comida'],
            ['nombre' => 'PedidosYa'],
            ['nombre' => 'Petshop'],
            ['nombre' => 'Reparaciones'],
            ['nombre' => 'Restaurante'],
            ['nombre' => 'Rappi'],
            ['nombre' => 'Servicios'],
            ['nombre' => 'Supermercado'],
            ['nombre' => 'Suscripción'],
            ['nombre' => 'Verdulería'],
            ['nombre' => 'Veterinaria'],
        ]);
    }
}
