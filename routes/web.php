<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TabunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login'])->name('auth.login-post');
Route::prefix('tabungan')->group(function() {
    Route::get('/', [TabunganController::class, 'index'])->name('tabungan');
    Route::get('create', [TabunganController::class, 'create'])->name('tabungan.create');
    Route::get('edit/{id?}', [TabunganController::class, 'edit'])->name('tabungan.edit');
    Route::get('delete/{id?}', [TabunganController::class, 'delete'])->name('tabungan.delete');
    Route::get('view/{id?}', [TabunganController::class, 'view'])->name('tabungan.view');
    Route::post('store', [TabunganController::class, 'store'])->name('tabungan.store');
    Route::post('update/{id?}', [TabunganController::class, 'update'])->name('tabungan.update');
});

Route::prefix('pengeluaran')->group(function() {
    Route::get('/', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::get('create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::get('edit/{id?}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::get('delete/{id?}', [PengeluaranController::class, 'delete'])->name('pengeluaran.delete');
    Route::get('view/{id?}', [PengeluaranController::class, 'view'])->name('pengeluaran.view');
    Route::post('store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::post('update/{id?}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
});