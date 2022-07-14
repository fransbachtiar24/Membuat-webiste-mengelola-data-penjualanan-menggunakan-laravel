<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdukTshirtController;
use App\Http\Controllers\HalamanUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfiluserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LaporanController;
use App\Models\Kategori;
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
    return view('users.tampilandepan');
});

//login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
//------------------------------------------------------

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth','admin');

Route::get('/moccostore.com', [HalamanUserController::class, 'pengguna'])->name('pengguna');
Route::get('profile', [HalamanUserController::class, 'profile'])->name('profile');

//Route mengatur database produk
Route::resource('produk', ProdukController::class)->middleware('auth', 'admin');
//Route mengatur database kategori
Route::resource('kategori', KategoriController::class)->middleware('auth', 'admin');
//---------------------------------------------------------

//Route kategori
Route::get('/kategori', [KategoriController::class, "index"])->middleware('auth', 'admin');
Route::get('/search', [KategoriController::class, "search"])->name('search');
Route::patch('/kategori/{kategori}', [KategoriController::class, "update"])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, "destroy"])->name('kategori.destroy');
//---------------------------------------------------------

//Route untuk export pdf
Route::get('/exportpdf', [ProdukController::class, 'exportpdf'])->name('exportpdf');
Route::get('/cetak', [ProdukController::class, 'cetak'])->name('cetak');
//-----------------------------------------------


Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk')->middleware('auth', 'admin');
Route::get('/search', [ProdukController::class, 'search'])->name('search');
//--------------------------------------------------------

Route::resource('pelanggan', PelangganController::class);
//page
Route::get('/profil', [KategoriController::class, 'profil'])->name('profil')->middleware('auth', 'admin');
Route::get('/help', [KategoriController::class, 'help'])->name('help')->middleware('auth', 'admin');
Route::get('/setting', [KategoriController::class, 'setting'])->name('setting')->middleware('auth', 'admin');
Route::resource('produkbaju', BajuController::class);
Route::get('/brand', [BajuController::class, 'index'])->name('brand');
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan')->middleware('auth', 'admin');






//shopping
Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping');
Route::get('/beli', [ShoppingController::class, 'beli'])->name('beli');

//---------------------------
Route::resource('admin', AdminController::class);
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth', 'admin');
Route::post('admin/store', [AdminController::class, 'store']);
//===============================



Route::resource('profiluser', ProfiluserController::class);
Route::get('profiluser', [ProfiluserController::class, 'index'])->name('profiluser');
//


Route::get('/pesan/{id}', [PesanController::class, 'index']);
Route::get('/checkout', [PesanController::class, 'chackout']);
Route::resource('pesan/store','PesanControlle@store');

Route::resource('laporan', LaporanController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan')->middleware('auth', 'admin');
Route::get('/pencarian', [LaporanController::class, 'index'])->name('pencarian');
Route::get('/cetaklaporan', [LaporanController::class, 'cetak'])->name('cetaklaporan');