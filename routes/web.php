<?php

use App\Http\Controllers\MajorController;
use App\Models\Major;
use Illuminate\Support\Facades\Route;

// Homepage Route
Route::get('/', function () {

    return view('pages.app');

})->name('Homepage');

// Create Major Routes
Route::get('/create/major', [MajorController::class, 'create'])->name('Major.create');
Route::post('/store/major', [MajorController::class, 'store'])->name('Major.store');
Route::get('/list/majors', [MajorController::class, 'index'])->name('Major.list');
Route::get('/majors/{id}/edit', [MajorController::class, 'edit'])->name('Major.edit');
Route::put('/majors/{id}/update', [MajorController::class, 'update'])->name('Major.update');
Route::delete('/delete/major/{id}', [MajorController::class, 'destroy'])->name('Major.delete');
