<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdPersonal;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdPersonal::create([
            'nom_personal' => 'GIOVANNA ALEJANDRINA' ,
            'ape_paterno'  => 'MANRIQUE',
            'ape_materno' => 'NARVAEZ',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '32975322',
            'direccion' => 'TorresDirec',
            'celular' => '999999999',
            'email' => 'giovanna.manrique@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
          'nom_personal' => 'Ruben' ,
          'ape_paterno'  => 'Arribasplata',
          'ape_materno' => 'Aponte',
          'usuario_sisac'=> 'D99941294',
          'cargo' => 'Consultor' ,
          'tipo_personal' => 'Regular',
          'tipo_doc_iden' => 'CEX',
          'nro_doc_iden' => '47667788',
          'direccion' => 'Urb. Santa Rosa Mz. E Lt.24',
          'celular' => '957889900',
          'email' => 'ruben.arriblasplata@claro-negocios.com.pe',
      ]);
    }
}
