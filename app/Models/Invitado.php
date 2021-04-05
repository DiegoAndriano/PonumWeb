<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Invitado extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['passcode'];

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

}
