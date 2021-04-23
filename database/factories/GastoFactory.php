<?php

namespace Database\Factories;

use App\Models\Gasto;
use App\Models\Invitado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GastoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gasto::class;

    protected $productos = [
      'Lavandina',
      'Coca Cola',
      'Pepsi',
      'Detergente',
      'Leche',
    ];

    /**
     * Por defecto crea como invitado.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => array_rand($this->productos),
            'precio' => 'ARS' . $this->faker->numberBetween(0, 1000),
            'invitado_id' => Invitado::factory()->create()->id,
            'comprado_at' => Carbon::now(),
        ];
    }

    public function con_usuario($user = null)
    {
        return $this->state(function (array $attributes) use ($user){
            return [
                'invitado_id' => null,
                'user_id' => $user ? $user : User::factory()->create()->id,
            ];
        });
    }

    public function metodo_pago($metodoPago = 1)
    {
        return $this->state(function (array $attributes) use ($metodoPago){
            return [
                'categoria_id' => $metodoPago,
            ];
        });
    }

    public function categorizado($categoria = 1)
    {
        return $this->state(function (array $attributes) use ($categoria) {
            return [
                'categoria_id' => $categoria,
            ];
        });
    }

    /**
     * @param $fecha
     * @return GastoFactory
     *
     * requiere una fecha con el formato 2021-04-23 19:03:42 (carbon::now())
     */
    public function fecha($fecha)
    {
        return $this->state(function (array $attributes) use ($fecha) {
            return [
                'comprado_at' => $fecha,
            ];
        });
    }
}
