<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    // return view('welcome');
    return redirect('/admin');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect('/admin');
    })->name('dashboard');
});


//Demo de uso snappy para manejar PDF
// Route::get('graphs', 'PdfController@graphs');
// Route::get('graphs-pdf', 'PdfController@graphPdf'); 

Route::get('graphs', [PdfController::class, 'graphs']);
Route::get('graphs-pdf', [PdfController::class, 'graphPdf']);