<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImportFileController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::get('import_file', [ImportFileController::class, 'index'])->name('admin.importfile.index');
Route::post('import_file_parse', [ImportFileController::class, 'parseImport'])->name('admin.importfile.parseImport');
Route::post('import_file_process', [ImportFileController::class, 'processImport'])->name('admin.importfile.processImport');
