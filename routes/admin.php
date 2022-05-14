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
use App\Http\Controllers\Admin\ClienteController;

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

//Cliente
Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::get('removidos/cliente', [ClienteController::class, 'indextrash'])->name('admin.clientes.indextrash');
Route::put('clientes/{cliente}/destroylogico', [ClienteController::class, 'destroyLogico'])->name('admin.clientes.destroyLogico');
Route::put('clientes/{cliente}/restaurarCliente', [ClienteController::class, 'restaurarCliente'])->name('admin.clientes.restaurarCliente');