<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdServicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 1,
            'nom_servicio' => 'Alta'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 1,
            'nom_servicio' => 'Portabilidad'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 1,
            'nom_servicio' => 'Renovacion'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 2,
            'nom_servicio' => 'FTTH'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 2,
            'nom_servicio' => 'HFC'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 2,
            'nom_servicio' => 'IFI'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 2,
            'nom_servicio' => 'OLO'
        ]);
        BsdServicio::create([
            'bsd_tipo_servicio_id'=> 3,
            'nom_servicio' => 'Fibra Óptica'
        ]);        
    }
}
