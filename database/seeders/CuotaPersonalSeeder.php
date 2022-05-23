<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdCuotaPersonal;

class CuotaPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdCuotaPersonal::create([
            'bsd_cuota_id'  => '1',
            'bsd_personal_id'  => '1',
            'mes'  => 'Julio',
            'año'  => '2022',
        ]);
        BsdCuotaPersonal::create([
            'bsd_cuota_id'  => '2',
            'bsd_personal_id'  => '2',
            'mes'  => 'Agosto',
            'año'  => '2022',
        ]);
    }
}
