<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas de las categorias
Route::get('/category', [CategoryController::class, 'categoryView'])->middleware(['auth', 'verified'])->name('category');
Route::post('/category', [CategoryController::class, 'createCategory'])->middleware(['auth', 'verified'])->name('crearCategory');
Route::get('/category/edit/{id}', [CategoryController::class, 'updateCategoryView'])->middleware(['auth', 'verified'])->name('editarCategoryView');
Route::post('/category/edit/{id}', [CategoryController::class, 'updateCategory'])->middleware(['auth', 'verified'])->name('editarCategory');
Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->middleware(['auth', 'verified'])->name('eliminarCategory');


//Rutas de las tareas
Route::get('/task', [App\Http\Controllers\TaskController::class, 'taskView'])->middleware(['auth', 'verified'])->name('task');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'createTask'])->middleware(['auth', 'verified'])->name('crearTask');
Route::get('/task/edit/{id}', [App\Http\Controllers\TaskController::class, 'updateTaskView'])->middleware(['auth', 'verified'])->name('editarTaskView');
Route::post('/task/edit/{id}', [App\Http\Controllers\TaskController::class, 'updateTask'])->middleware(['auth', 'verified'])->name('editarTask');
Route::get('/task/delete/{id}', [App\Http\Controllers\TaskController::class, 'deleteTask'])->middleware(['auth', 'verified'])->name('eliminarTask');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
