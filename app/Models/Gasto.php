<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $casts = [
        'comprado_at' => 'datetime',
    ];

    protected $fillable = ['nombre', 'precio', 'comprado_at'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function metodo_pago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id');
    }

    public function invitado()
    {
        return $this->belongsTo(Invitado::class, 'invitado_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
