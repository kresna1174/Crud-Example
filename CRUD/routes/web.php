<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\DownloadController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login-post');

Route::group(['prefix' => 'crud'], function() {
    Route::get('/', [CRUDController::class, 'index'])->name('crud');
    Route::get('create', [CRUDController::class, 'create'])->name('crud.create');
    Route::get('edit/{id?}', [CRUDController::class, 'edit'])->name('crud.edit');
    Route::get('delete/{id?}', [CRUDController::class, 'delete'])->name('crud.delete');
    Route::get('view/{id?}', [CRUDController::class, 'view'])->name('crud.view');
    Route::post('store', [CRUDController::class, 'store'])->name('crud.store');
    Route::post('update/{id?}', [CRUDController::class, 'update'])->name('crud.update');
});