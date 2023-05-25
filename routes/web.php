<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');