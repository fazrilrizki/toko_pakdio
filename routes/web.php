<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\SaldoAkunController;
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
    return view('welcome');
});

Route::get('debug', [CustomerController::class, 'debug']);

//BACKEND
Route::get('loginAdmin', [AdminController::class, 'formLogin']);
Route::post('actionLogin', [AdminController::class, 'actionLogin']);
Route::get('dashboard', [AdminController::class, 'dashboard']);

//JENIS PRODUK
Route::get('indexDataJenisProduk', [AdminController::class, 'indexDataJenisProduk']);
Route::post('insertJenisProduk', [JenisProdukController::class, 'insertJenisProduk']);
Route::post('updateJenisProduk', [JenisProdukController::class, 'updateJenisProduk']);
Route::post('deleteJenisProduk', [JenisProdukController::class, 'deleteJenisProduk']);

//PRODUK
Route::get('indexDataProduk', [ProdukAdminController::class, 'indexDataProduk']);
Route::post('insertProduk', [ProdukAdminController::class, 'insertProduk']);

Route::get('indexDataUsers', [AdminController::class, 'indexDataUsers']);
Route::post('updateDataUser', [AdminController::class, 'updateDataUser']);

//PEMBAYARAN
Route::get('indexDataPembayaran', [PembayaranController::class, 'indexDataPembayaran']);


//SALDO AKUN PELANGGAN
Route::get('indexDataSaldoAkun', [SaldoAkunController::class, 'indexDataSaldoAkun']);
Route::post('deleteSaldo', [SaldoAkunController::class, 'deleteSaldo']);

Route::get('indexDataPesanan', [AdminController::class, 'indexTransaksiPesanan']);
Route::get('logout', [AdminController::class, 'actionLogout']);

//FRONTEND
Route::get('registerCustomer', [CustomerController::class, 'formRegisterCustomer'])->name('login')->middleware('guest');
Route::post('actionRegisterCustomer', [CustomerController::class, 'actionRegisterCustomer']);
Route::post('auth', [CustomerController::class, 'authenticate']);

Route::get('home', [CustomerController::class, 'homeCustomer'])->name('guestHome')->middleware('guest');
Route::get('about', [CustomerController::class, 'about']);
Route::get('product', [ProductController::class, 'product']);

Route::middleware('auth')->group(function () {
    Route::get('index', [CustomerController::class, 'indexCustomer']);
    Route::get('formTransaksi', [ProductController::class, 'order']);
    Route::post('insertTransaksi', [ProductController::class, 'actionTransaksi']);
    Route::get('pembayaran', [PembayaranController::class, 'pembayaranUser']);
});

// ROUTE LOGOUT
Route::post('logout', [CustomerController::class, 'LogoutUser']);
