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

        // seccion Usuarios
        Permission::create(['name' => 'adminlte.usuarios', 'description' => 'Ver sección: Usuarios'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver opción: Registro de Usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver opción: Registro de roles'])->syncRoles([$roleAdmin]);

        // seccion Personal
        Permission::create(['name' => 'adminlte.personal', 'description' => 'Ver sección: Personal'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.personal.index', 'description' => 'Ver opción: Registro personal'])->syncRoles([$roleAdmin]);

        // seccion clientes
        Permission::create(['name' => 'adminlte.clientes', 'description' => 'Ver sección: Clientes'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.clientes.index', 'description' => 'Ver opción: Registro clientes'])->syncRoles([$roleAdmin]);

        // seccion cargas masivas
        Permission::create(['name' => 'adminlte.cargasmasivas', 'description' => 'Ver sección: Cargas Masivas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.import_basefija.index', 'description' => 'Ver opción: Base Fija'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.import_basemovil.index', 'description' => 'Ver opción: Base Movil'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.import_baserenueva.index', 'description' => 'Ver opción: Base Renueva'])->syncRoles([$roleAdmin]);

        // seccion ventas
        Permission::create(['name' => 'adminlte.ventas', 'description' => 'Ver sección: Ventas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        //Permission::create(['name' => 'admin.ventas.index'])->syncRoles([$roleAdmin]);

        // seccion reportes
        Permission::create(['name' => 'adminlte.reportes', 'description' => 'Ver sección: Reportes'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        //Permission::create(['name' => 'admin.reportes.index'])->syncRoles([$roleAdmin]);

        // seccion servicio
        Permission::create(['name' => 'adminlte.servicio', 'description' => 'Ver sección: Servicio'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.servicio.index', 'description' => 'Ver opción: Registro Servicio'])->syncRoles([$roleAdmin]);
        
        //seccion cuota
        Permission::create(['name' => 'adminlte.cuotas', 'description' => 'Ver sección: Cuota'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.cuotas.index', 'description' => 'Ver opción: Registro Cuota'])->syncRoles([$roleAdmin]);

        //seccion tipo de servicio
        Permission::create(['name' => 'adminlte.tiposervicio', 'description' => 'Ver sección: Tipo de Servicio'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.tiposervicio.index', 'description' => 'Ver opción: Registro Tipo de Servicio'])->syncRoles([$roleAdmin]);
 
        //seccion plan
        Permission::create(['name' => 'adminlte.plan', 'description' => 'Ver sección: Plan'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.plan.index', 'description' => 'Ver opción: Registro Plan'])->syncRoles([$roleAdmin]);

        //seccion empresa
        Permission::create(['name' => 'adminlte.empresa', 'description' => 'Ver sección: Empresa'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.empresa.index', 'description' => 'Ver opción: Registro Empresa'])->syncRoles([$roleAdmin]);

    }
}
