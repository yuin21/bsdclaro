<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImportFileController;
use App\Http\Controllers\Admin\ImportBaseFijaController;
use App\Http\Controllers\Admin\ImportBaseMovilController;
use App\Http\Controllers\Admin\ImportBaseRenuevaController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\ServicioController;
use App\Http\Controllers\Admin\CuotaController;
use App\Http\Controllers\Admin\ProductoTelefoniaController;
use App\Http\Controllers\Admin\TipoServicioController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\VentaController;

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

//Producto Telefonia
Route::resource('productotelefonia', ProductoTelefoniaController::class)->names('admin.productotelefonia');
Route::get('removidos/productotelefonia', [ProductoTelefoniaController::class, 'indextrash'])->name('admin.productotelefonia.indextrash');
Route::put('productotelefonia/{productotelefonium}/destroylogico', [ProductoTelefoniaController::class, 'destroyLogico'])->name('admin.productotelefonia.destroyLogico');
Route::put('productotelefonia/{productotelefonium}/restaurarProductoTelefonia', [ProductoTelefoniaController::class, 'restaurarProductoTelefonia'])->name('admin.productotelefonia.restaurarProductoTelefonia');

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