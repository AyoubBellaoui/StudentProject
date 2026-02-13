<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Models\Major;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    // Homepage Route
    Route::get('/', function () {
        return view('pages.app');
    })->name('Homepage');

    // CRUD operations Route
    Route::get('/create/major', [MajorController::class, 'create'])->name('Major.create');
    Route::post('/store/major', [MajorController::class, 'store'])->name('Major.store');
    Route::get('/list/majors', [MajorController::class, 'index'])->name('Major.list');
    Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('Major.edit');
    Route::put('/majors/{id}/update', [MajorController::class, 'update'])->name('Major.update');
    Route::delete('/delete/major/{id}', [MajorController::class, 'destroy'])->name('Major.delete');

    // Logout Route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login_form'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'show_register_form'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});



