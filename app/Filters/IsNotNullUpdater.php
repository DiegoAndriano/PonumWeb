<?php

namespace App\Filters;

class IsNotNullUpdater{

    private $attrs;
    private $gasto;

    public function __construct($attrs, $gasto)
    {
        $this->attrs = $attrs;
        $this->gasto = $gasto;
    }

    /**
     * Redirige cada parametro a la función adecuada para actualizar el modelo con atributos condicionales.
     */
    public function apply()
    {
        foreach (collect($this->attrs) as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }

            if (strlen($value)) {
                $this->$name($value, $this->gasto);
            }
        }
    }

}
