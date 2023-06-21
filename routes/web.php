<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dataongkir', [App\Http\Controllers\TambahOngkirController::class, 'index'])->name('home');
    Route::get('/tambahongkir', [App\Http\Controllers\TambahOngkirController::class, 'tambahongkir']);
    Route::post('/insertongkir', [App\Http\Controllers\TambahOngkirController::class, 'insertongkir']);

    Route::get('/tampilkandataongkir/{id}', [App\Http\Controllers\TambahOngkirController::class, 'tampil'])->name('tampilkanongkir');
    Route::post('/updatedataongkir/{id}', [App\Http\Controllers\TambahOngkirController::class, 'updatedataongkir'])->name('updatedataongkir');

    Route::get('/deleteongkir/{id}', [App\Http\Controllers\TambahOngkirController::class, 'delete'])->name('deleteongkir');
    Route::get('/trashongkir', [App\Http\Controllers\TambahOngkirController::class, 'trash'])->name('admin/trashongkir');
    Route::get('/restoreongkir/{id}', [App\Http\Controllers\TambahOngkirController::class, 'restoreongkir'])->name('admin/restoreongkir');
    Route::get('/restoreongkirall', [App\Http\Controllers\TambahOngkirController::class, 'restoreongkirall'])->name('admin/restoreongkirall');
    Route::get('/hapuspermanenongkir/{id}', [App\Http\Controllers\TambahOngkirController::class, 'hapuspermanenongkir'])->name('hapuspermanenongkir');
    Route::get('/hapuspermanenongkirall', [App\Http\Controllers\TambahOngkirController::class, 'hapuspermanenongkirall'])->name('hapuspermanenongkirall');


    Route::get('/kudus', [App\Http\Controllers\TambahOngkirController::class, 'kudus']);
    Route::get('/pati', [App\Http\Controllers\TambahOngkirController::class, 'pati']);
    Route::get('/rembang', [App\Http\Controllers\TambahOngkirController::class, 'rembang']);
    Route::get('/semarang', [App\Http\Controllers\TambahOngkirController::class, 'semarang']);
    Route::get('/demak', [App\Http\Controllers\TambahOngkirController::class, 'demak']);
});
