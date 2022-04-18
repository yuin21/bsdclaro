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
            'name' => 'BSD SYSTEM',
            'email' => 'bsdsystem@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');


        User::create([
            'name' => 'Federico',
            'email' => 'federico@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Consultor');

        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Vendedor');

    }
}
