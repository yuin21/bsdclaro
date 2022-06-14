<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonalApiController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\VentaApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/personal', [PersonalApiController::class, 'search'])->name('api.personal.search');
Route::get('/clientes/searchLike', [ClienteApiController::class, 'searchLike'])->name('api.clientes.searchLike');
Route::get('/clientes/search', [ClienteApiController::class, 'search'])->name('api.clientes.search');
Route::get('/clientes/searchSunat', [ClienteApiController::class, 'searchSunat'])->name('api.clientes.searchSunat');
Route::get('/venta', [VentaApiController::class, 'search'])->name('api.ventas.search');