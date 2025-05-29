<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin-login', 'admin-login');

Route::post('admin-login', [App\Http\Controllers\AdminController::class, 'login']);

Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);

Route::get('admin-categories', [App\Http\Controllers\AdminController::class, 'categories']);

Route::get('admin-logout', [App\Http\Controllers\AdminController::class, 'logout']);
Route::post('add-category', [App\Http\Controllers\AdminController::class, 'addCategory']);
Route::get('category/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteCategory']);
// Route::get('category/edit/{id}', [App\Http\Controllers\AdminController::class, 'editCategory']);
Route::get('add-quiz', [App\Http\Controllers\AdminController::class, 'addQuiz']);
