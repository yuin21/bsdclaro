<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdCuota;

class CuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdCuota::create([
            'cuota'  => '800',
        ]);
        BsdCuota::create([
            'cuota'  => '900',
        ]);
    }
}
