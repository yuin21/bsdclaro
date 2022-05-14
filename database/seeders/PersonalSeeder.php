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
            'nom_personal' => 'Pedro' ,
            'ape_paterno'  => 'Torres',
            'ape_materno' => 'Garcia',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'CEX',
            'nro_doc_iden' => '111111111111',
            'direccion' => 'TorresDirec',
            'celular' => '1223334444',
            'email' => 'pedrito@gmail.com',
        ]);

        BsdPersonal::create([
          'nom_personal' => 'Juan' ,
          'ape_paterno'  => 'Fuentes',
          'ape_materno' => 'Flores',
          'cargo' => 'Consultor' ,
          'tipo_personal' => 'Regular',
          'tipo_doc_iden' => 'CEX',
          'nro_doc_iden' => '22222222222',
          'direccion' => 'FuentesDirec',
          'celular' => '8223354444',
          'email' => 'juanfuentes@gmail.com',
      ]);
    }
}
