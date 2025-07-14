<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/todo', [TodoController::class, 'index'])->name('todo');