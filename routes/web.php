<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for TodoController


Route::prefix('/todo')->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
   
});