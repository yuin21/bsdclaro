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
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 3,
            'nombre_plan' => 'Fibra 30 Mbps',
            'precio' => 1200.00,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS 49.90',
            'precio' => 49.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 69.90',
            'precio' => 69.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 79.90',
            'precio' => 79.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 89.90',
            'precio' => 89.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 109.90',
            'precio' => 109.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 125.00',
            'precio' => 125.00,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 159.90',
            'precio' => 159.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'MAX NEGOCIOS ILIMITADO 189.90',
            'precio' => 189.90,
        ]);
    }
}
