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

// CRUD Operations Route (Major)
Route::get('/create/major', [MajorController::class, 'create'])->name('major.create'); 
Route::post('/store/major', [MajorController::class, 'store'])->name('major.store');
Route::get('/list/majors', [MajorController::class, 'index'])->name('major.list');
Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('major.edit');
Route::put('/majors/{id}/update', [MajorController::class, 'update'])->name('major.update');
Route::delete('/delete/major/{id}', [MajorController::class, 'destroy'])->name('major.delete');

// CRUD Operations Route (Student)
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::post('/store/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/list/students', [StudentController::class, 'index'])->name('student.list');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('/delete/student/{id}', [StudentController::class, 'destroy'])->name('student.delete');





