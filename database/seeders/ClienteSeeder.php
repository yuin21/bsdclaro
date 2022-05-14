<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdCliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdCliente::create([
            'ruc'  => '10800865255',
            'razon_social'  => 'FekiSHop',
            'num_celular'  => '111222333',
            'direccion'  => 'Fekimania',
            'departamento'  => 'fekideparta',
            'provincia'  => 'fekiprovincia',
            'distrito'  => 'fekilugar',
            'tipo_cliente'  => 'fekitipo',
        ]);

        BsdCliente::create([
            'ruc'  => '10700722111',
            'razon_social'  => 'AnonimoShop',
            'num_celular'  => '888222333',
            'direccion'  => 'Anonimomania',
            'departamento'  => 'Anonimodeparta',
            'provincia'  => 'Anonimoprovincia',
            'distrito'  => 'Anonimolugar',
            'tipo_cliente'  => 'Anonimotipo',
        ]);
    }
}
