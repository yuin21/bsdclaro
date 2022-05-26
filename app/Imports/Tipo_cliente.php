<?php

namespace App\Imports;

class Tipo_cliente
{
    public $cliente;
    public $name;

    public static function getTipo_cliente()
    {
        $t1 = new Tipo_cliente();
        $t2 = new Tipo_cliente();
   

        $t1->cod = 'NUEVO';
        $t1->name = 'NUEVO';
        $t2->cod = 'VIEJO';
        $t2->name = 'VIEJO';
        

        $tipos_cliente = collect([$t1, $t2]);
        return $tipos_cliente;
    }
}
