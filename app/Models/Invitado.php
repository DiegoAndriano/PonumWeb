<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Invitado extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = ['passcode'];

    public function guardName(){
        return "";
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

}
