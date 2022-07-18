<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(TipoServicioSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CuotaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(CuotaPersonalSeeder::class);
        $this->call(EstadoLineaSeeder::class);
    }
}
