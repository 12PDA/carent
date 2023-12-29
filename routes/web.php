<?php

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
    return view('auth/login_page');
});

Auth::routes(['verify' => true]);
    Route::get('/signin', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/proses_login', [App\Http\Controllers\AuthController::class, 'proses_login'])->name('proses_login');
    Route::post('/proses_register', [App\Http\Controllers\AuthController::class, 'register'])->name('proses_register');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::get('/admin_mobil', [App\Http\Controllers\admin\MobilController::class, 'index']);
Route::get('/tambah_mobil', [App\Http\Controllers\admin\MobilController::class, 'tambah']);
Route::post('/proses_tambah_mobil', [App\Http\Controllers\admin\MobilController::class, 'proses_tambah']);
Route::get('/mobil_edit/{id}', [App\Http\Controllers\admin\MobilController::class, 'edit']);
Route::post('/admin_mobil_update/{id}', [App\Http\Controllers\admin\MobilController::class, 'proses_update'])->name('mobil_update');
Route::get('/mobil_hapus/{id}', [App\Http\Controllers\admin\MobilController::class, 'hapus']);
Route::get('/admin_mobil_detail/{id}', [App\Http\Controllers\admin\MobilController::class, 'detail']);


Route::get('/admin_customer', [App\Http\Controllers\admin\CustomerController::class, 'index']);
Route::get('/tambah_customer', [App\Http\Controllers\admin\CustomerController::class, 'tambah']);
Route::post('/proses_tambah_customer', [App\Http\Controllers\admin\CustomerController::class, 'proses_tambah']);
Route::get('/customer_edit/{id}', [App\Http\Controllers\admin\CustomerController::class, 'edit']);
Route::post('/admin_customer_update/{id}', [App\Http\Controllers\admin\CustomerController::class, 'proses_update'])->name('customer_update');
Route::get('/customer_hapus/{id}', [App\Http\Controllers\admin\CustomerController::class, 'hapus']);


Route::get('/admin_peminjaman', [App\Http\Controllers\admin\PeminjamanController::class, 'index']);
Route::get('/tambah_pinjam', [App\Http\Controllers\admin\PeminjamanController::class, 'tambah']);
Route::post('/proses_pinjam_mobil', [App\Http\Controllers\admin\PeminjamanController::class, 'proses_tambah']);
Route::get('/pinjam_detail/{id}', [App\Http\Controllers\admin\PeminjamanController::class, 'detail']);

Route::get('/admin_pengembalian', [App\Http\Controllers\admin\PengembalianController::class, 'index']);
Route::post('/admin_proses_kembali', [App\Http\Controllers\admin\PengembalianController::class, 'proses_kembali']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
