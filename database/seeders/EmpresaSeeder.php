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
            'ruc'  => '10800865855',
            'razon_social'  => 'KAIROS E.I.R.L.',
            'representante'  => 'Kairos',
            'direccion' => 'Avenida Venezuela',
            'celular' => '987654321',
            'email' => 'kairos@gmail.com',
        ]);
        BsdEmpresa::create([
            'ruc'  => '10890865845',
            'razon_social'  => 'KAI',
            'representante'  => 'Kai',
            'direccion' => 'Avenida Brasil',
            'celular' => '987654323',
            'email' => 'kai@gmail.com',
        ]);
    }
}
