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
        $roleVende = Role::create(['name' => 'Mesa de Control']);

        // seccion Registros
        Permission::create(['name' => 'adminlte.registros', 'description' => 'Sección: Registros'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.personal.index', 'description' => 'Personal'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.clientes.index', 'description' => 'Clientes'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.tiposervicio.index', 'description' => 'Tipo de Servicio'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.servicio.index', 'description' => 'Servicios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.estado_linea.index', 'description' => 'Estado de las Lineas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.plan.index', 'description' => 'Planes'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.cuotas.index', 'description' => 'Cuotas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.cuotapersonal.indexf', 'description' => 'Asignar Cuota'])->syncRoles([$roleAdmin]);

        // seccion Procesos
        Permission::create(['name' => 'adminlte.procesos', 'description' => 'Sección: Procesos'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.ventas.index', 'description' => 'Ventas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.pagos.indexf', 'description' => 'Pagos'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion

        // seccion Reportes
        Permission::create(['name' => 'adminlte.reportes', 'description' => 'Sección: Reportes'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.reportes.indexVentasDiarias', 'description' => 'Ventas Diarias'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.reportes.indexVentasConsultor', 'description' => 'Ventas por Consultor'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.reportes.indexGraficas', 'description' => 'Gráficas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.reportes.indexfVentas', 'description' => 'Ventas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion

        // seccion Configuración
        Permission::create(['name' => 'adminlte.configuracion', 'description' => 'Sección: Configuración'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        Permission::create(['name' => 'admin.empresa.index', 'description' => 'Empresa'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Roles'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.indexf', 'description' => 'Usuarios'])->syncRoles([$roleAdmin]);
        // subsección cargas masivas
        //Permission::create(['name' => 'adminlte.cargasmasivas', 'description' => 'Sub Sección: Cargas Masivas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        //Permission::create(['name' => 'admin.import_basefija.index', 'description' => 'Base Fija'])->syncRoles([$roleAdmin]);
        //Permission::create(['name' => 'admin.import_basemovil.index', 'description' => 'Base Movil'])->syncRoles([$roleAdmin]);
        //Permission::create(['name' => 'admin.import_baserenueva.indexf', 'description' => 'Base Renueva'])->syncRoles([$roleAdmin]);


        // // seccion Usuarios
        // Permission::create(['name' => 'adminlte.usuarios', 'description' => 'Ver sección: Usuarios'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.users.index', 'description' => 'Ver opción: Registro de Usuarios'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver opción: Registro de roles'])->syncRoles([$roleAdmin]);

        // // seccion Personal
        // Permission::create(['name' => 'adminlte.personal', 'description' => 'Ver sección: Personal'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.personal.index', 'description' => 'Ver opción: Registro personal'])->syncRoles([$roleAdmin]);

        // // seccion clientes
        // Permission::create(['name' => 'adminlte.clientes', 'description' => 'Ver sección: Clientes'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.clientes.index', 'description' => 'Ver opción: Registro clientes'])->syncRoles([$roleAdmin]);

        // // seccion cargas masivas
        // Permission::create(['name' => 'adminlte.cargasmasivas', 'description' => 'Ver sección: Cargas Masivas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.import_basefija.index', 'description' => 'Ver opción: Base Fija'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.import_basemovil.index', 'description' => 'Ver opción: Base Movil'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.import_baserenueva.index', 'description' => 'Ver opción: Base Renueva'])->syncRoles([$roleAdmin]);

        // // seccion ventas
        // Permission::create(['name' => 'adminlte.ventas', 'description' => 'Ver sección: Ventas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // //Permission::create(['name' => 'admin.ventas.index'])->syncRoles([$roleAdmin]);

        // // seccion reportes
        // Permission::create(['name' => 'adminlte.reportes', 'description' => 'Ver sección: Reportes'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // //Permission::create(['name' => 'admin.reportes.index'])->syncRoles([$roleAdmin]);

        // // seccion servicio
        // Permission::create(['name' => 'adminlte.servicio', 'description' => 'Ver sección: Servicio'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.servicio.index', 'description' => 'Ver opción: Registro Servicio'])->syncRoles([$roleAdmin]);

        // //seccion cuota
        // Permission::create(['name' => 'adminlte.cuotas', 'description' => 'Ver sección: Cuota'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.cuotas.index', 'description' => 'Ver opción: Registro Cuota'])->syncRoles([$roleAdmin]);

        // //seccion tipo de servicio
        // Permission::create(['name' => 'adminlte.tiposervicio', 'description' => 'Ver sección: Tipo de Servicio'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.tiposervicio.index', 'description' => 'Ver opción: Registro Tipo de Servicio'])->syncRoles([$roleAdmin]);

        // //seccion plan
        // Permission::create(['name' => 'adminlte.plan', 'description' => 'Ver sección: Plan'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.plan.index', 'description' => 'Ver opción: Registro Plan'])->syncRoles([$roleAdmin]);

        // //seccion Estado de las Líneas
        // Permission::create(['name' => 'adminlte.estadolinea', 'description' => 'Ver sección: Estado de Líneas'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.estado_linea.index', 'description' => 'Ver opción: Registro Estado de Líneas'])->syncRoles([$roleAdmin]);

        // //seccion empresa
        // Permission::create(['name' => 'adminlte.empresa', 'description' => 'Ver sección: Empresa'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.empresa.index', 'description' => 'Ver opción: Registro Empresa'])->syncRoles([$roleAdmin]);

        // //seccion Número de linea nueva
        // Permission::create(['name' => 'adminlte.numero_linea_nueva', 'description' => 'Ver sección: Número linea nueva'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.numero_linea_nueva.index', 'description' => 'Ver opción: Número linea nueva'])->syncRoles([$roleAdmin]);

        // //seccion empresa
        // Permission::create(['name' => 'adminlte.cuotapersonal', 'description' => 'Ver sección: Cuota'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // Permission::create(['name' => 'admin.cuotapersonal.index', 'description' => 'Ver opción: Asignar Cuota'])->syncRoles([$roleAdmin]);

        // // seccion pagos
        // Permission::create(['name' => 'adminlte.pagos', 'description' => 'Ver sección: Pagos'])->syncRoles([$roleAdmin]); // para ver el titulo de seccion
        // //Permission::create(['name' => 'admin.ventas.index'])->syncRoles([$roleAdmin]);
    }
}
