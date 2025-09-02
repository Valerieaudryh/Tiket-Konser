<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/packages/detail/{slug}', [HomeController::class, 'packages_detail']);

Route::get('/packages/checkout/{id}', [TransactionController::class, 'packages_checkout']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/transaksi/sudah-bayar', [UserController::class, 'trx_bayar']);
Route::get('/transaksi/belum-bayar', [UserController::class, 'trx_belum']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/profile/edit', [UserController::class, 'profile_edit']);
Route::put('/profile/edit/{id}', [UserController::class, 'update_profile'])->name('user.update');

// admin
Route::get('/produk', [UserController::class, 'produk']);
Route::get('/variasi', [UserController::class, 'variasi']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/datatransaksi', [UserController::class, 'datatransaksi'])->name('datatransaksi');
Route::get('/datatransaksiverif', [UserController::class, 'datatransaksiverif'])->name('datatransaksiverif');
Route::get('datatransaksidibayar', [UserController::class, 'datatransaksiDibayar'])->name('datatransaksidibayar');
Route::get('/batalTransaksi', [UserController::class, 'bataltransaksi'])->name('batalTransaksi');
Route::get('/downloadBuktiBayar', [UserController::class, 'downloadBuktiBayar'])->name('downloadfile');
Route::get('/setujuiTransaksi', [UserController::class, 'setujuitransaksi'])->name('setujuitransaksi');

Route::post('getDetailTransaksi', [UserController::class, 'getDetailTransaksi'])->name('getdetailtransaksi');

Route::post('saveBuktiBayar', [UserController::class, 'saveBuktiBayar'])->name('savebuktibayar');

Route::post('refreshWidget', [UserController::class, 'refreshWidget'])->name('refreshwidget');

// produk
Route::get('/dataproduk', [UserController::class, 'dataproduk'])->name('dataproduk');
Route::get('/hapusproduk', [UserController::class, 'hapusproduk'])->name('hapusproduk');
Route::post('getDetailProduk', [UserController::class, 'getDetailProduk'])->name('getdetailproduk');
Route::post('saveEditproduk', [UserController::class, 'saveEditproduk'])->name('saveeditproduk');
Route::post('saveTambahproduk', [UserController::class, 'saveTambahproduk'])->name('savetambahproduk');

// variasi
Route::get('/atur/variasi/{slug}', [UserController::class, 'variasi']);
Route::get('/datavariasi', [UserController::class, 'datavariasi'])->name('datavariasi');
Route::get('/hapusvariasi', [UserController::class, 'hapusvariasi'])->name('hapusvariasi');
Route::post('getDetailVariasi', [UserController::class, 'getDetailVariasi'])->name('getdetailvariasi');
Route::post('saveEditvariasi', [UserController::class, 'saveEditvariasi'])->name('saveeditvariasi');
Route::post('saveTambahvariasi', [UserController::class, 'saveTambahvariasi'])->name('savetambahvariasi');

Route::post('/payment', [TransactionController::class, 'payment']);

Route::get('/team', function () {
    return view('team');
});

// Auth::routes();

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/login', [AuthController::class, 'loginAction']);
Route::post('/register', [AuthController::class, 'register']);
