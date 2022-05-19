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
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\CuotaPersonalController;

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

//Ventas
Route::resource('ventas', VentaController::class)->only(['index', 'create', 'store', 'show'])->names('admin.ventas');

//Empresa
Route::resource('empresa', EmpresaController::class)->names('admin.empresa');
Route::get('removidos/empresa', [EmpresaController::class, 'indextrash'])->name('admin.empresa.indextrash');
Route::put('empresa/{empresa}/destroylogico', [EmpresaController::class, 'destroyLogico'])->name('admin.empresa.destroyLogico');
Route::put('empresa/{empresa}/restaurarEmpresa', [EmpresaController::class, 'restaurarEmpresa'])->name('admin.empresa.restaurarEmpresa');

//CuotaPersonal
Route::resource('cuotapersonal', CuotaPersonalController::class)->names('admin.cuotapersonal');
Route::get('removidos/cuotapersonal', [CuotaPersonalController::class, 'indextrash'])->name('admin.cuotapersonal.indextrash');
Route::put('cuotapersonal/{cuotapersonal}/destroylogico', [CuotaPersonalController::class, 'destroyLogico'])->name('admin.cuotapersonal.destroyLogico');
Route::put('cuotapersonal/{cuotapersonal}/restaurarCuotaPersonal', [CuotaPersonalController::class, 'restaurarCuotaPersonal'])->name('admin.cuotapersonal.restaurarCuotaPersonal');
