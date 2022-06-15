<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoLineaSeeder extends Seeder
{
  
    public function run()
    {
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 1,
        'nombre_estado_linea' => 'Pendiente aprob. del cliente',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 1,
        'nombre_estado_linea' => 'Créditos',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 1,
        'nombre_estado_linea' => 'Áreas',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 1,
        'nombre_estado_linea' => 'Activos',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 2,
        'nombre_estado_linea' => 'Pendiente de instalación',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 2,
        'nombre_estado_linea' => 'Activo',
       ]);
       BsdEstadoLinea::create([
        'bsd_tipo_servicio_id' => 2,
        'nombre_estado_linea' => 'Créditos',
       ]);
    }
}
