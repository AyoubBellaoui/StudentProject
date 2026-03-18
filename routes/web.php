<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Models\Major;
use Illuminate\Support\Facades\Route;


// Homepage Route
Route::get('/', function () {
    return view('pages.app');
})->name('Homepage');

// CRUD operations Route (Major)
Route::get('/create/major', [MajorController::class, 'create'])->name('Major.create');
Route::post('/store/major', [MajorController::class, 'store'])->name('Major.store');
Route::get('/list/majors', [MajorController::class, 'index'])->name('Major.list');
Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('Major.edit');
Route::put('/majors/{id}/update', [MajorController::class, 'update'])->name('Major.update');
Route::delete('/delete/major/{id}', [MajorController::class, 'destroy'])->name('Major.delete');

// CRUD operations Route (Student)
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::post('/store/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/list/students', [StudentController::class, 'index'])->name('student.list');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('/delete/student/{id}', [StudentController::class, 'destroy'])->name('student.delete');





