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
        ])->assignRole('Super Administrador');


        User::create([
            'name' => 'Maynor Izaguirre',
            'email' => 'maynor.izaguirre@hotmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Consultor');

        User::create([
            'name' => 'Juan Carlos Salas Espíritu',
            'email' => 'jsalasespiritu@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Vendedor');

        User::create([
            'name' => 'Paola Peréz',
            'email' => 'perez_loyola@hotmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Vendedor');

    }
}
