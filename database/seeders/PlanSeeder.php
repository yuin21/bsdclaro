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
            'nombre_plan' => 'Max Corporativo 29.90',
            'precio' => 29.9,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios 39.90',
            'precio' => 39.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios 49.90',
            'precio' => 49.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 55.90',
            'precio' => 55.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 69.90',
            'precio' => 69.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 79.90',
            'precio' => 79.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 89.90',
            'precio' => 89.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 109.90',
            'precio' => 109.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 125.00',
            'precio' => 125.00,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 159.90',
            'precio' => 159.90,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 1,
            'nombre_plan' => 'Max Negocios Ilimitado 189.90',
            'precio' => 189.90,
        ]);

        //--- Fija 
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 20 Mbps Mega',
            'precio' => 0.00,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 20 Mbps Up',
            'precio' => 0.00,
        ]);
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 30 Mbps',
            'precio' => 68.99,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 30 Mbps + TV Basico',
            'precio' => 0.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 30 Mbps + Telefonia 100',
            'precio' => 79.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 30 Mbps + TV Avanzado',
            'precio' => 144.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 50 Mbps',
            'precio' => 79.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 50 Mbps + TV Basico',
            'precio' => 0.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 50 Mbps + Telefonia 100',
            'precio' => 88.90,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 50 Mbps + TV Avanzado',
            'precio' => 153.99,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 100 Mbps',
            'precio' => 99.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 100 Mbps + Telefonia 100',
            'precio' => 109.00,
        ]);
        
        
        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 100 Mbps + Telefonia 100 + TV Avanzado',
            'precio' => 0.00,
        ]);

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 2,
            'nombre_plan' => 'Internet 200 Mbps',
            'precio' => 149.00,
        ]);
        //--- Internet Fibra 

        BsdPlan::create([
            'bsd_tipo_servicio_id' => 3,
            'nombre_plan' => 'Fibra 30 Mbps',
            'precio' => 1200.00,
        ]);
        
    }
}
