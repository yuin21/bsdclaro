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
            'ruc'  => '20607560219',
            'razon_social'  => 'PRODUCCIONES & CATERING GM E.I.R.L.',
            'num_celular'  => '945889900',
            'direccion'  => 'Av. Pacifico 574',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'NUEVO CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]);       
    }
}
