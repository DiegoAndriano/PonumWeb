<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function tipo_gasto()
    {
        return $this->belongsTo(TipoGasto::class, 'tipo_gasto_id');
    }

    public function metodo_pago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id');
    }
}
