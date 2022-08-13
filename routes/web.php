
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



Route::resource('/data_barang',\App\Http\Controllers\DataBarangController::class)->middleware('auth');


Route::resource('/data_supplier',\App\Http\Controllers\SupplierController::class)->middleware('auth');


Route::resource('/barang_masuk',\App\Http\Controllers\BarangMasukController::class)->middleware('auth');


Route::resource('/barang_keluar',\App\Http\Controllers\BarangKeluarController::class)->middleware('auth');

Route::resource('/kategori_barang',\App\Http\Controllers\KategoribarangController::class)->middleware('auth');


Route::resource('/data_merk',\App\Http\Controllers\MerkController::class)->middleware('auth');



Route::get('/data_user', [App\Http\Controllers\LandingController::class, 'tampilkan_user'])->name('tampilkan_user')->middleware('auth');

Route::post('/data_user', [App\Http\Controllers\LandingController::class, 'TambahUser'])->name('TambahUser')->middleware('auth');

Route::delete('/data_user/{id}', [App\Http\Controllers\LandingController::class, 'HapusUser'])->name('HapusUser')->middleware('auth');



Route::get('/kelompok_user', [App\Http\Controllers\LandingController::class, 'kelompok_user'])->name('kelompok_user')->middleware('auth');




// BERBAGAI LAPORAN BARANG 

Route::get('/laporan_stok_barang', [App\Http\Controllers\LandingController::class, 'laporan_stok_barang'])->name('laporan_stok_barang')->middleware('auth');

Route::get('/laporan_barang_masuk', [App\Http\Controllers\LandingController::class, 'laporan_barang_masuk'])->name('laporan_barang_masuk')->middleware('auth');

Route::get('/laporan_barang_keluar', [App\Http\Controllers\LandingController::class, 'laporan_barang_keluar'])->name('laporan_barang_keluar')->middleware('auth');

Route::get('/laporan_stok_barang/pdf', [App\Http\Controllers\LandingController::class, 'cetak_barang_pdf'])->name('cetak_barang_pdf')->middleware('auth');


Route::get('/laporan_barang_masuk/pdf', [App\Http\Controllers\LandingController::class, 'cetak_barang_masuk'])->name('cetak_barang_masuk')->middleware('auth');



Route::get('/laporan_barang_masuk_semua/pdf', [App\Http\Controllers\LandingController::class, 'cetak_barang_masuk_semua'])->name('cetak_barang_masuk_semua')->middleware('auth');






Route::get('/laporan_barang_keluar_semua/pdf', [App\Http\Controllers\LandingController::class, 'cetak_barang_keluar_semua'])->name('cetak_barang_keluar_semua')->middleware('auth');








Route::get('/laporan_barang_masuk/filtered_masukan', [App\Http\Controllers\LandingController::class, 'filtered_masukan'])->name('filtered_masukan')->middleware('auth');


Route::get('/laporan_barang_keluar/filtered_luaran', [App\Http\Controllers\LandingController::class, 'filtered_luaran'])->name('filtered_luaran')->middleware('auth');
