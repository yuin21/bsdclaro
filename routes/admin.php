<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImportBaseFijaController;
use App\Http\Controllers\Admin\ImportBaseMovilController;
use App\Http\Controllers\Admin\ImportBaseRenuevaController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ServicioController;
use App\Http\Controllers\Admin\CuotaController;
use App\Http\Controllers\Admin\TipoServicioController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\EstadoLineaController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\NumeroLineaNuevaController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\CuotaPersonalController;
use App\Http\Controllers\Admin\ReportesController;
use App\Http\Controllers\Admin\PagoController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//perfil
Route::get('perfil', [PerfilController::class, 'index'])->name('admin.perfil.index');

//usuarios
Route::resource('users', UserController::class)->names('admin.users');

//roles
Route::resource('roles', RoleController::class)->names('admin.roles');

//Carga Masiva - BaseFija
Route::get('import_basefija', [ImportBaseFijaController::class, 'index'])->name('admin.importbasefija.index');
Route::post('import_basefija_parse', [ImportBaseFijaController::class, 'parseImport'])->name('admin.importbasefija.parseImport');
Route::post('import_basefija_process', [ImportBaseFijaController::class, 'processImport'])->name('admin.importbasefija.processImport');

//Carga Masiva - BaseMovil
Route::get('import_basemovil', [ImportBaseMovilController::class, 'index'])->name('admin.importbasemovil.index');
Route::post('import_basemovil_parse', [ImportBaseMovilController::class, 'parseImport'])->name('admin.importbasemovil.parseImport');
Route::post('import_basemovil_process', [ImportBaseMovilController::class, 'processImport'])->name('admin.importbasemovil.processImport');

//Carga Masiva - BaseRenueva
Route::get('import_baserenueva', [ImportBaseRenuevaController::class, 'index'])->name('admin.importbaserenueva.index');
Route::post('import_baserenueva_parse', [ImportBaseRenuevaController::class, 'parseImport'])->name('admin.importbaserenueva.parseImport');
Route::post('import_baserenueva_process', [ImportBaseRenuevaController::class, 'processImport'])->name('admin.importbaserenueva.processImport');

//Personal
Route::resource('personal', PersonalController::class)->names('admin.personal');
Route::get('removidos/personal', [PersonalController::class, 'indextrash'])->name('admin.personal.indextrash');
Route::put('personal/{personal}/destroylogico', [PersonalController::class, 'destroyLogico'])->name('admin.personal.destroyLogico');
Route::put('personal/{personal}/restaurarPersonal', [PersonalController::class, 'restaurarPersonal'])->name('admin.personal.restaurarPersonal');
Route::post('personal/{personal}/generarPDF', [PersonalController::class, 'generatePDF'])->name('admin.personal.generatePDF');
Route::get('personal/pdf/allpersonal', [PersonalController::class, 'generatePDF_allPersonal'])->name('admin.personal.pdf.allpersonal');

//Cliente
Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::get('removidos/cliente', [ClienteController::class, 'indextrash'])->name('admin.clientes.indextrash');
Route::put('clientes/{cliente}/destroylogico', [ClienteController::class, 'destroyLogico'])->name('admin.clientes.destroyLogico');
Route::put('clientes/{cliente}/restaurarCliente', [ClienteController::class, 'restaurarCliente'])->name('admin.clientes.restaurarCliente');
//Servicio
Route::resource('servicio', ServicioController::class)->names('admin.servicio');
Route::get('removidos/servicio', [ServicioController::class, 'indextrash'])->name('admin.servicio.indextrash');
Route::put('servicio/{servicio}/destroylogico', [ServicioController::class, 'destroyLogico'])->name('admin.servicio.destroyLogico');
Route::put('servicio/{servicio}/restaurarServicio', [ServicioController::class, 'restaurarServicio'])->name('admin.servicio.restaurarServicio');

//Cuota
Route::resource('cuotas', CuotaController::class)->names('admin.cuotas');
Route::get('removidos/cuotas', [CuotaController::class, 'indextrash'])->name('admin.cuotas.indextrash');
Route::put('cuotas/{cuota}/destroylogico', [CuotaController::class, 'destroyLogico'])->name('admin.cuotas.destroyLogico');
Route::put('cuotas/{cuota}/restaurarCuota', [CuotaController::class, 'restaurarCuotas'])->name('admin.cuotas.restaurarCuotas');

//Tipo_Servicio
Route::resource('tiposervicio', TipoServicioController::class)->names('admin.tiposervicio');
Route::get('removidos/tiposervicio', [TipoServicioController::class, 'indextrash'])->name('admin.tiposervicio.indextrash');
Route::put('tiposervicio/{tiposervicio}/destroylogico', [TipoServicioController::class, 'destroyLogico'])->name('admin.tiposervicio.destroyLogico');
Route::put('tiposervicio/{tiposervicio}/restaurarProductoTelefonia', [TipoServicioController::class, 'restaurarTipoServicio'])->name('admin.tiposervicio.restaurarTipoServicio');

//Plan
Route::resource('plan', PlanController::class)->names('admin.plan');
Route::get('removidos/plan', [PlanController::class, 'indextrash'])->name('admin.plan.indextrash');
Route::put('plan/{plan}/destroylogico', [PlanController::class, 'destroyLogico'])->name('admin.plan.destroyLogico');
Route::put('plan/{plan}/restaurarPlan', [PlanController::class, 'restaurarPlan'])->name('admin.plan.restaurarPlan');

//Estado de las líneas de tipo de servicio
Route::resource('estado_linea', EstadolineaController::class)->names('admin.estado_linea');
Route::get('removidos/estado_linea', [EstadolineaController::class, 'indextrash'])->name('admin.estado_linea.indextrash');
Route::put('estado_lineas/{estado_linea}/destroylogico', [EstadolineaController::class, 'destroyLogico'])->name('admin.estado_linea.destroyLogico');
Route::put('estado_lineas/{estado_linea}/restauraEstadoLinea', [EstadolineaController::class, 'restauraEstadoLinea'])->name('admin.estado_linea.restauraEstadoLinea');

//Ventas
Route::resource('ventas', VentaController::class)->only(['index', 'create', 'store', 'show'])->names('admin.ventas');
Route::get('ventas/tracking/{venta}', [VentaController::class, 'tracking'])->name('admin.ventas.tracking');
Route::put('ventas/tracking/{venta}/update', [VentaController::class, 'trackingUpdate'])->name('admin.ventas.tranckingupdate');
Route::get('removidos/ventas', [VentaController::class, 'indextrash'])->name('admin.ventas.indextrash');
Route::put('ventas/{ventas}/destroylogico', [VentaController::class, 'destroyLogico'])->name('admin.ventas.destroyLogico');
Route::put('ventas/{ventas}/restaurarVenta', [VentaController::class, 'restaurarVenta'])->name('admin.ventas.restaurarVenta');

//Numero_linea_nueva
Route::resource('numero_linea_nueva', NumeroLineaNuevaController::class)->names('admin.numero_linea_nueva');
Route::get('removidos/numero_linea_nueva', [NumeroLineaNuevaController::class, 'indextrash'])->name('admin.numero_linea_nueva.indextrash');
Route::put('numero_linea_nueva/{numero_linea_nueva}/destroylogico', [NumeroLineaNuevaController::class, 'destroyLogico'])->name('admin.numero_linea_nueva.destroyLogico');
Route::put('numero_linea_nueva/{numero_linea_nueva}/restaurarNumero', [NumeroLineaNuevaController::class, 'restaurarNumero'])->name('admin.numero_linea_nueva.restaurarNumero');

//Empresa_1
Route::resource('empresa', EmpresaController::class)->names('admin.empresa');
Route::get('removidos/empresa', [EmpresaController::class, 'indextrash'])->name('admin.empresa.indextrash');
Route::put('empresa/{empresa}/destroylogico', [EmpresaController::class, 'destroyLogico'])->name('admin.empresa.destroyLogico');
Route::put('empresa/{empresa}/restaurarEmpresa', [EmpresaController::class, 'restaurarEmpresa'])->name('admin.empresa.restaurarEmpresa');

//CuotaPersonal
Route::resource('cuotapersonal', CuotaPersonalController::class)->names('admin.cuotapersonal');
Route::get('removidos/cuotapersonal', [CuotaPersonalController::class, 'indextrash'])->name('admin.cuotapersonal.indextrash');
Route::put('cuotapersonal/{cuotapersonal}/destroylogico', [CuotaPersonalController::class, 'destroyLogico'])->name('admin.cuotapersonal.destroyLogico');
Route::put('cuotapersonal/{cuotapersonal}/restaurarCuotaPersonal', [CuotaPersonalController::class, 'restaurarCuotaPersonal'])->name('admin.cuotapersonal.restaurarCuotaPersonal');

//Reportes
Route::get('reportes/ventasDiarias', [ReportesController::class, 'index_ventasDiarias'])->name('admin.reportes.indexVentasDiarias');
Route::post('reportes/ventasDiarias/buscar', [ReportesController::class, 'search'])->name('admin.reportes.search');
Route::post('reportes/{venta}/generarPDF', [ReportesController::class, 'generatePDF'])->name('admin.reportes.generatePDF');
Route::get('reportes/graficas', [ReportesController::class, 'indexGraficas'])->name('admin.reportes.indexGraficas');
Route::get('reportes/ventasConsultor', [ReportesController::class, 'index_ventasConsultor'])->name('admin.reportes.indexVentasConsultor');
Route::post('reportes/ventasConsultor/buscar', [ReportesController::class, 'searchConsultor'])->name('admin.reportes.searchConsultor');
Route::get('reportes/ventas', [ReportesController::class, 'index_ventas'])->name('admin.reportes.indexVentas');
Route::post('reportes/ventas/buscar', [ReportesController::class, 'consultar_venta_rpt'])->name('admin.reportes.consultar_venta_rpt');
Route::get('reportes/pagos', [ReportesController::class, 'index_pagos'])->name('admin.reportes.indexPagos');
Route::post('reportes/pagos/buscar', [ReportesController::class, 'consultar_pago_rpt'])->name('admin.reportes.consultar_pago_rpt');

//Pagos
Route::resource('pagos', PagoController::class)->only(['index', 'create', 'store', 'show'])->names('admin.pagos');
Route::get('pagos/tracking/{pago}', [PagoController::class, 'tracking'])->name('admin.pagos.tracking');
Route::put('pagos/tracking/{pago}/update', [PagoController::class, 'trackingUpdate'])->name('admin.pagos.tranckingupdate');
Route::get('removidos/pagos', [PagoController::class, 'indextrash'])->name('admin.pagos.indextrash');
Route::put('pagos/{pago}/destroylogico', [PagoController::class, 'destroyLogico'])->name('admin.pagos.destroyLogico');
Route::put('pagos/{pago}/restaurarVenta', [PagoController::class, 'restaurarPago'])->name('admin.pagos.restaurarPago');
