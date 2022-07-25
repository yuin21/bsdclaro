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
            'nom_personal' => 'Rubén Leonel' ,
            'ape_paterno'  => 'Arribasplata',
            'ape_materno' => 'Ponte',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888880',
            'direccion' => '',
            'celular' => '',
            'email' => 'ruben.arribasplata@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
          'nom_personal' => 'Maricarmen Lisbette' ,
          'ape_paterno'  => 'Cabrera',
          'ape_materno' => 'Chacón',
          'usuario_sisact'=> 'D99941294',
          'cargo' => 'Consultor' ,
          'tipo_personal' => 'Regular',
          'tipo_doc_iden' => 'DNI',
          'nro_doc_iden' => '88888881',
          'direccion' => '',
          'celular' => '',
          'email' => 'maricarmen.cabrera@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
        'nom_personal' => 'Yessenia' ,
        'ape_paterno'  => 'Escalante',
        'ape_materno' => '',
        'usuario_sisact'=> 'D99941294',
        'cargo' => 'Consultor' ,
        'tipo_personal' => 'Regular',
        'tipo_doc_iden' => 'DNI',
        'nro_doc_iden' => '88888882',
        'direccion' => '',
        'celular' => '',
        'email' => 'yessenia.escalante@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Mary' ,
            'ape_paterno'  => 'Flores',
            'ape_materno' => '',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888883',
            'direccion' => '',
            'celular' => '',
            'email' => 'mary.flores@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Kell Maynor' ,
            'ape_paterno'  => 'Izaguirre',
            'ape_materno' => 'León',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888884',
            'direccion' => '',
            'celular' => '',
            'email' => 'maynor.izaguirre@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Giovanna' ,
            'ape_paterno'  => 'Manrique',
            'ape_materno' => 'Narvaez',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888885',
            'direccion' => '',
            'celular' => '',
            'email' => 'giovanna.manrique@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Yessenia Paola' ,
            'ape_paterno'  => 'Peréz',
            'ape_materno' => 'Loyola',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888886',
            'direccion' => '',
            'celular' => '',
            'email' => 'paola.perez@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Cristhian' ,
            'ape_paterno'  => 'Rivas',
            'ape_materno' => 'Loyola',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888887',
            'direccion' => '',
            'celular' => '',
            'email' => 'cristhian.rivas@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'Juan Carlos' ,
            'ape_paterno'  => 'Salas',
            'ape_materno' => 'Espíritu',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888888',
            'direccion' => '',
            'celular' => '',
            'email' => 'juan.salas@claro-negocios.com.pe',
        ]);

        BsdPersonal::create([
            'nom_personal' => 'José' ,
            'ape_paterno'  => 'Silva',
            'ape_materno' => '',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888889',
            'direccion' => '',
            'celular' => '',
            'email' => 'jose.silva@claro-negocios.com.pe',
        ]);

            BsdPersonal::create([
            'nom_personal' => 'Daniel' ,
            'ape_paterno'  => 'Zarate',
            'ape_materno' => '',
            'usuario_sisact'=> 'D99941294',
            'cargo' => 'Vendedor' ,
            'tipo_personal' => 'Senior',
            'tipo_doc_iden' => 'DNI',
            'nro_doc_iden' => '88888890',
            'direccion' => '',
            'celular' => '',
            'email' => 'daniel.zarate@claro-negocios.com.pe',
        ]);
    }
}