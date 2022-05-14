<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdTipoServicio;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdTipoServicio::create([
            'nom_tipo_servicio' => 'movil',
        ]);
        BsdTipoServicio::create([
            'nom_tipo_servicio' => 'fija',
        ]);
    }
}
