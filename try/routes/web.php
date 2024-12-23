<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students/index',[StudentController::class, 'index'])->name('students.index');

Route::post('/students/indexsave',[StudentController::class, 'indexsave'])->name('students.indexsave');


// Route::post('/students',[StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{register}/edit',[StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{register}/update',[StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{register}/destroy',[StudentController::class, 'destroy'])->name('students.destroy');

Route::post('/students/login',[StudentController::class, 'login'])->name('students.login');
Route::get('/students/login',[StudentController::class, 'login'])->name('students.login');
// Route::post('/students',[StudentController::class, 'store'])->name('students.store');
Route::get('/students/nextindex', [StudentController::class, 'nextindex'])->name('students.nextindex');


Route::post('/students/loginsave',[StudentController::class, 'loginsave'])->name('students.loginsave');

Route::get('/students/nextindex',[StudentController::class, 'nextindex'])->name('students.nextindex');


