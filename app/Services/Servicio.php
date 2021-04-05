<?php

namespace App\Services;

abstract class Servicio{

    public static function perform(){
        (new static)->handle();
    }

    abstract function handle();
}
