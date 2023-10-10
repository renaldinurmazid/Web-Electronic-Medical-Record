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
    Route::get('users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('users/edit/{id}', [UserController::class, 'show'])->name('user.edit');
    Route::put('users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

//Kelas Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
     // Create
     Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
     Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
     // Edit
     Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
     Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
     // Delete
     Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

//obats Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('obat', [ObatController::class, 'index'])->name('obat.index');
     // Create
     Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
     Route::post('/obat/store', [ObatController::class, 'store'])->name('obat.store');
     // Edit
     Route::get('/obat/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
     Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
     // Delete
     Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
});

//siswa Controller Admin
Route::middleware(['auth'])->group(function () {
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Create
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    // Edit
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Delete
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('siswa/{id}/pdf', [SiswaController::class, 'pdf'])->name('siswa.pdf');
});

// Dashboard Controller Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('petugas/home', [DashboardP::class, 'index'])->name('petugas.dashboard');
});