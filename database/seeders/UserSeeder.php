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
            'name' => 'Alex César Yupanqui Inocente',
            'email' => 'yuin21@hotmail.com',
            'password' => bcrypt('Admin2022=')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Juan Carlos Salas Espíritu',
            'email' => 'jsalasespiritu@gmail.com',
            'password' => bcrypt('Admin2022.')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Kell Maynor Izaguirre León',
            'email' => 'maynor.izaguirre@hotmail.com',
            //'password' => '$2y$10$wTb37VtCQh5M9a0zCL73VuLpVf1awHNeOi2XrjqwehJyFK0269GEG'
            'password' => bcrypt('12345678')
        ])->assignRole('Consultor');

        User::create([
            'name' => 'Yessenia Paola Loyola Peréz',
            'email' => 'perez_loyola@hotmail.com',
            //'password' => '$2y$10$/N0zXSqcrJiCokB4i1ghFO/KifOtxd6V3Jz0FjbD7UwdvQ2zrZRcy'
            'password' => bcrypt('12345678')
        ])->assignRole('Mesa de Control');

    }
}
