<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProdukController;

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
    return view('welcome');
});

// Route::resource('dashboard', ProdukController::class);

Route::get('getApi', [ProdukController::class, 'getApi']);
Route::get('dashboard', [ProdukController::class, 'index'])->name('dashboard');
Route::post('dashboard', [ProdukController::class, 'store'])->name('dashboard.store');
Route::put('dashboard/{dashboard}', [ProdukController::class, 'update'])->name('dashboard.update');
Route::delete('dashboard/{dashboard}', [ProdukController::class, 'destroy'])->name('dashboard.destroy');
