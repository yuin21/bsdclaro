<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleConsu = Role::create(['name' => 'Consultor']);
        $roleVende = Role::create(['name' => 'Vendedor']);

        // $permission = Permission::create(['name' => 'admin.home'])->syncRoles([$roleAdmin]); NO SE NECESITA PORQUE NO HAY VISTA PUBLICA
        $permission = Permission::create(['name' => 'admin.users.index'])->syncRoles([$roleAdmin]);
        $permission = Permission::create(['name' => 'admin.import_file.index'])->syncRoles([$roleAdmin, $roleVende]);
        // $permission = Permission::create(['name' => 'admin.users.edit'])->syncRoles([$roleAdmin]); NO SE NECESITA PORQUE SE PROTEGE TODO CON admin.users.index
        // $permission = Permission::create(['name' => 'admin.users.update'])->syncRoles([$roleAdmin]); NO SE NECESITA PORQUE SE PROTEGE TODO CON admin.users.index
    }
}
