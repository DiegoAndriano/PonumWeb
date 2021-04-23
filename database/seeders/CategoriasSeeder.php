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
            [
                'nombre' => 'Supermercado',
                'tag' => 'SUPERMERCADO',
            ],
            [
                'nombre' => 'Alquiler',
                'tag' => 'ALQUILER',
            ],
            [
                'nombre' => 'Suscripción',
                'tag' => 'SUSCRIPCION',
            ],
            [
                'nombre' => 'Otros',
                'tag' => 'OTROS',
            ],
            [
                'nombre' => 'Luz',
                'tag' => 'LUZ',
            ],
            [
                'nombre' => 'Agua',
                'tag' => 'AGUA',
            ],
            [
                'nombre' => 'Gas',
                'tag' => 'GAS',
            ],
            [
                'nombre' => 'Inversión',
                'tag' => 'INVERSION',
            ],
            [
                'nombre' => 'Expensas',
                'tag' => 'EXPENSAS',
            ],
            [
                'nombre' => 'Verdulería',
                'tag' => 'VERDULERIA',
            ],
            [
                'nombre' => 'Fiambrería',
                'tag' => 'FIAMBRERIA',
            ],
            [
                'nombre' => 'Librería',
                'tag' => 'LIBRERIA',
            ],
            [
                'nombre' => 'Bar',
                'tag' => 'BAR',
            ],
            [
                'nombre' => 'Licorería',
                'tag' => 'LICORERIA',
            ],
            [
                'nombre' => 'Restaurante',
                'tag' => 'RESTAURANTE',
            ],
            [
                'nombre' => 'Mercado Libre',
                'tag' => 'MERCADO_LIBRE',
            ],
            [
                'nombre' => 'Pedido de comida',
                'tag' => 'PEDIDO_DE_COMIDA',
            ],
            [
                'nombre' => 'Almacén',
                'tag' => 'ALMACEN',
            ],
            [
                'nombre' => 'Servicios',
                'tag' => 'SERVICIOS',
            ],
            [
                'nombre' => 'PedidosYa',
                'tag' => 'PEDIDOS_YA',
            ],
            [
                'nombre' => 'Rappi',
                'tag' => 'RAPPI',
            ],
            [
                'nombre' => 'Glovo',
                'tag' => 'GLOVO',
            ],
            [
                'nombre' => 'Hogar',
                'tag' => 'HOGAR',
            ],
            [
                'nombre' => 'Reparaciones',
                'tag' => 'REPARACIONES',
            ],
            [
                'nombre' => 'Libros',
                'tag' => 'LIBROS',
            ],
            [
                'nombre' => 'Educación',
                'tag' => 'EDUCACION',
            ],
        ]);
    }
}
