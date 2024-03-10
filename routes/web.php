<?php

use App\Http\Controllers\CostumerController;
use App\Http\Controllers\JenisCucianController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::controller(CostumerController::class)->group(function () {
        Route::get('/costumer', 'index');
        Route::post('/costumer/simpan', 'store');
        Route::put('/costumer/edit/{costumer}', 'edit');
        Route::patch('/costumer/update/{costumer}', 'update');
        Route::delete('/costumer/delete/{costumer}', 'destroy');
    });

    Route::controller(JenisCucianController::class)->group(function () {
        Route::get('/jenis', 'index');
        Route::post('/jenisCucian/simpan', 'store');
        Route::put('/jenisCucian/edit/{jenisCucian}', 'edit');
        Route::patch('/jenisCucian/update/{jenisCucian}', 'update');
        Route::delete('/jenisCucian/delete/{jenisCucian}', 'destroy');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index');
        Route::get('/transaksi/create', 'create');
        Route::post('/orders', 'store');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
