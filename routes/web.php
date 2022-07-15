
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


// Route::get('/data_barang', [App\Http\Controllers\LandingController::class, 'data_barang'])->name('data_barang');


// Route::get('/data_supplier', [App\Http\Controllers\LandingController::class, 'supplier'])->name('supplier');

// Route::get('/barang_masuk', [App\Http\Controllers\LandingController::class, 'barang_masuk'])->name('barang_masuk');


// Route::get('/barang_keluar', [App\Http\Controllers\LandingController::class, 'barang_keluar'])->name('barang_keluar');



Route::resource('/data_barang',\App\Http\Controllers\DataBarangController::class)->middleware('is_superadmin');


Route::resource('/data_supplier',\App\Http\Controllers\SupplierController::class)->middleware('is_superadmin');


Route::resource('/barang_masuk',\App\Http\Controllers\BarangMasukController::class)->middleware('is_superadmin');


Route::resource('/barang_keluar',\App\Http\Controllers\BarangKeluarController::class)->middleware('is_superadmin');

Route::get('/data_user', [App\Http\Controllers\LandingController::class, 'tampilkan_user'])->name('tampilkan_user')->middleware('is_superadmin');

Route::get('/kelompok_user', [App\Http\Controllers\LandingController::class, 'kelompok_user'])->name('kelompok_user')->middleware('is_superadmin');



// BERBAGAI LAPORAN BARANG 

Route::get('/laporan_stok_barang', [App\Http\Controllers\LandingController::class, 'laporan_stok_barang'])->name('laporan_stok_barang')->middleware('is_superadmin');

Route::get('/laporan_barang_masuk', [App\Http\Controllers\LandingController::class, 'laporan_barang_masuk'])->name('laporan_barang_masuk')->middleware('is_superadmin');

Route::get('/laporan_barang_keluar', [App\Http\Controllers\LandingController::class, 'laporan_barang_keluar'])->name('laporan_barang_keluar')->middleware('is_superadmin');

