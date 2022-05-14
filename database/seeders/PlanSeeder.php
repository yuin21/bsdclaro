<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdPlan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX CORPORATIVO 29.90',
            'precio' => 29.9,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 55.90',
            'precio' => 55.9,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS 39.90',
            'precio' => 39.9,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'INTERNET 100 MBPS + TELEFONIA 100',
            'precio' => 109,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'INTERNET 50 MBPS + TELEFONIA 100',
            'precio' => 88.99,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'INTERNET 50 MBPS + TV AVANZADO',
            'precio' => 153.99,
        ]);
    }
}
