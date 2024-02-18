<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriPakaianController;
use App\Http\Controllers\PakaianController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
// Action
Route::get('/', [DashboardController::class,'dashboard']);
Route::get('/profile', [DashboardController::class,'profile']);

// Users
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update', [UserController::class, 'update']);

// Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/create', [KaryawanController::class, 'create']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/activeInactive/{id}', [KaryawanController::class, 'activeInactive']);
Route::get('/karyawan/delete/{id}', [KaryawanController::class, 'delete']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update', [KaryawanController::class, 'update']);

// Pelanggan
Route::get('/pelanggan', [pelangganController::class, 'index']);
Route::get('/pelanggan/create', [pelangganController::class, 'create']);
Route::post('/pelanggan/store', [pelangganController::class, 'store']);
Route::get('/pelanggan/delete/{id}', [pelangganController::class, 'delete']);
Route::get('/pelanggan/edit/{id}', [pelangganController::class, 'edit']);
Route::post('/pelanggan/update', [pelangganController::class, 'update']);


// Kategori Pakaian
Route::get('/kategoriPakaian', [KategoriPakaianController::class, 'index']);
Route::get('/kategoriPakaian/create', [KategoriPakaianController::class, 'create']);
Route::post('/kategoriPakaian/store', [KategoriPakaianController::class, 'store']);
Route::post('/kategoriPakaian/delete', [KategoriPakaianController::class, 'delete']);
Route::get('/kategoriPakaian/edit/{id}', [KategoriPakaianController::class, 'edit']);
Route::post('/kategoriPakaian/update', [KategoriPakaianController::class, 'update']);

// Pakaian
Route::get('/pakaian', [PakaianController::class, 'index']);
Route::get('/pakaian/create', [PakaianController::class, 'create']);
Route::post('/pakaian/store', [PakaianController::class, 'store']);
Route::post('/pakaian/delete', [PakaianController::class, 'delete']);
Route::get('/pakaian/edit/{id}', [PakaianController::class, 'edit']);
Route::post('/pakaian/update', [PakaianController::class, 'update']);

// Gaji
Route::get('/gaji', [GajiController::class, 'index']);
Route::get('/gaji/create', [GajiController::class, 'create']);
Route::post('/pakaian/store', [PakaianController::class, 'store']);
Route::post('/pakaian/delete', [PakaianController::class, 'delete']);
Route::get('/pakaian/edit/{id}', [PakaianController::class, 'edit']);
Route::post('/pakaian/update', [PakaianController::class, 'update']);



// API
Route::get('/ListKaryawan', [KaryawanController::class, 'dataKaryawan']);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/login', [App\Http\Controllers\DashboardController::class, 'login']);
