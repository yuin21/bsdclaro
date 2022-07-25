<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdEmpresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdEmpresa::create([
            'ruc'  => '20605380175',
            'razon_social'  => 'Kairos Digital Multiservice E.I.R.L.',
            'representante'  => 'Salas Espiritu Gilbert Ricardo',
            'direccion' => 'Av. Los Ruiseñores Nro. 465 Dpto. G301 S/N Lima - Lima - Santa Anita',
            'celular' => '999980039',
            'email' => 'jsalasespiritu@gmail.com'
        ]);
      
    }
}