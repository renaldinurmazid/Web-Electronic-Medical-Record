<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardA;
use App\Http\Controllers\DashboardP;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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
});

Route::get('/login',[LoginController::class,'showloginform'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Profile Controller
Route::middleware(['auth'])->group(function () {
    Route::get('profil', [ProfileController::class, 'index'])->name('profile');
});

// Dashboard Controller  Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/home', [DashboardA::class, 'index'])->name('admin.dashboard');
});
//User Controller Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users');
});
//Kelas Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
});
//obats Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('obats', [ObatController::class, 'index'])->name('obats');
});
//siswa Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
});
// Dashboard Controller Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('petugas/home', [DashboardP::class, 'index'])->name('petugas.dashboard');
});