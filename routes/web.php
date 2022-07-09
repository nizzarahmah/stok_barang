
<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
});




Auth::routes();


Route::get('/', [\App\Http\Controllers\LandingController::class,'index'])->name('index')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/data_barang', [App\Http\Controllers\LandingController::class, 'data_barang'])->name('data_barang');


// Route::get('/data_supplier', [App\Http\Controllers\LandingController::class, 'supplier'])->name('supplier');

// Route::get('/barang_masuk', [App\Http\Controllers\LandingController::class, 'barang_masuk'])->name('barang_masuk');


// Route::get('/barang_keluar', [App\Http\Controllers\LandingController::class, 'barang_keluar'])->name('barang_keluar');



Route::resource('/data_barang',\App\Http\Controllers\DataBarangController::class)->middleware('auth');

Route::resource('/data_supplier',\App\Http\Controllers\SupplierController::class)->middleware('auth');

Route::resource('/barang_masuk',\App\Http\Controllers\BarangMasukController::class)->middleware('auth');

Route::resource('/barang_keluar',\App\Http\Controllers\BarangKeluarController::class)->middleware('auth');