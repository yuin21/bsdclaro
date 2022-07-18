<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Administrador',
            'email' => 'yuin21@hotmail.com',
            'password' => '$2y$10$qbJYAvKYonuivyDXdU8Sq.NoSn0x21Zgq7CIi1fmlZUecjF1N2vq.'
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Maynor Izaguirre',
            'email' => 'maynor.izaguirre@hotmail.com',
            'password' => '$2y$10$wTb37VtCQh5M9a0zCL73VuLpVf1awHNeOi2XrjqwehJyFK0269GEG'
           // 'password' => bcrypt('12345678')
        ])->assignRole('Consultor');

        User::create([
            'name' => 'Juan Carlos Salas Espíritu',
            'email' => 'jsalasespiritu@gmail.com',
            'password' => '$2y$10$YLew4TpmJQEYhR//CR1.iudcVfwrxzsfvLFpusItd.eToLyVPGDGC'
        ])->assignRole('Vendedor');

        User::create([
            'name' => 'Paola Peréz',
            'email' => 'perez_loyola@hotmail.com',
            'password' => '$2y$10$/N0zXSqcrJiCokB4i1ghFO/KifOtxd6V3Jz0FjbD7UwdvQ2zrZRcy'
        ])->assignRole('Vendedor');

    }
}
