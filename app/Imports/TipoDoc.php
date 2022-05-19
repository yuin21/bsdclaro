<?php

namespace App\Imports;

class TipoDoc
{
    public $doc;
    public $name;

    public static function getTipoDoc()
    {
        $t1 = new TipoDoc();
        $t2 = new TipoDoc();
        $t3 = new TipoDoc();
        $t4 = new TipoDoc();
        $t5 = new TipoDoc();
        $t6 = new TipoDoc();
        $t7 = new TipoDoc();
        $t8 = new TipoDoc();

        $t1->cod = 'ABA';
        $t1->name = 'AMERICAN BANKERS ASOCIATION';
        $t2->cod = 'CDI';
        $t2->name = 'CEDULA DIPLOMATICA DE IDENTIDAD';
        $t3->cod = 'CEX';
        $t3->name = 'CARNET DE EXTRANJERIA';
        $t4->cod = 'DNI';
        $t4->name = 'DOCUMENTO NACIONAL DE IDENTIDAD';
        $t5->cod = 'IBA';
        $t5->name = 'INTERNATIONAL BANK ACCOUNT NUMBER';
        $t6->cod = 'PAS';
        $t6->name = 'PASAPORTE';
        $t7->cod = 'RUC';
        $t7->name = 'REGISTRO UNICO DE CONTRIBUYENTE';
        $t8->cod = 'SWIFT';
        $t8->name = 'SOCIETY FOR WORLDBANK INTERBANK FINANTIAL TELECOMMUNICATION';

        $tipos_doc = collect([$t1, $t2,$t3,$t4,$t5,$t6,$t7,$t8]);
        return $tipos_doc;
    }
}
