<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('latihan', [LatihanController::class, 'index']);
Route::get('tambah', [LatihanController::class, 'tambah'])->name('tambah');
Route::get('kurang', [LatihanController::class, 'kurang'])->name('kurang');
Route::get('kali', [LatihanController::class, 'kali'])->name('kali');
Route::get('bagi', [LatihanController::class, 'bagi'])->name('bagi');


//cara yang panjang manggilnya di sini
// Route::get('latihan', [App\Http\Controllers\LatihanController::class, 'index']);

Route::post('action-tambah', [LatihanController::class, 'actionTambah'])->name('action-tambah');
Route::post('action-kurang', [LatihanController::class, 'actionKurang'])->name('action-kurang');
Route::post('action-kali', [LatihanController::class, 'actionKali'])->name('action-kali');
Route::post('action-bagi', [LatihanController::class, 'actionBagi'])->name('action-bagi');

//login
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('dashboard', function () {
    return view('dashboard.index');
});

Route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
Route::post('action-logout', [LoginController::class, 'actionLogout'])->name('action-logout');

//dashboard
// Route::middleware(['auth', 'pervent-back'])->group(function())
// Route::get('dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');

// //resource : GET, POST , PUT, DELETE. PATCH
// Route::resource('user', \App\Http\Controllers\UserController::class);
// Route::resource('role', \App\Http\Controllers\RoleController::class);

// Route::resource('locker', \App\Http\Controllers\LockerController::class);
// Route::resource('major', \App\Http\Controllers\MajorController::class);
// Route::resource('key', \App\Http\Controllers\KeyController::class);
// Route::resource('student', \App\Http\Controllers\StudentController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    // Didalam Resource terdapat GET, POST, PUT, DELETE, PATCH
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);

    Route::resource('locker', \App\Http\Controllers\LockerController::class);
    Route::resource('major', \App\Http\Controllers\MajorController::class);
    Route::resource('key', \App\Http\Controllers\KeyController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::resource('instructor', \App\Http\Controllers\InstructorController::class);
    Route::resource('menu', \App\Http\Controllers\MenuController::class);
    Route::resource('user-role', \App\Http\Controllers\UserRoleController::class);
});
