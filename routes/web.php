<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::get('/', [CustomerController::class, 'home'])
    ->name('home');

Route::get('/login', [CustomerController::class, 'loginPage'])
    ->name('login');

Route::get('/signup', [CustomerController::class, 'signupPage'])
    ->name('signup');


/*
|--------------------------------------------------------------------------
| Customer POST APIs
|--------------------------------------------------------------------------
*/

Route::post('/api/signup', [AuthController::class, 'signup'])
    ->name('api.signup');

Route::post('/api/login', [AuthController::class, 'login'])
    ->name('api.login');

Route::post('/api/logout', [AuthController::class, 'logout'])
    ->name('api.logout');

Route::post('/api/cart/add', [CartController::class, 'add'])
    ->name('api.cart.add');

Route::post('/api/cart/remove/{cart}', [CartController::class, 'remove'])
    ->name('api.cart.remove');


/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');


/*
Admin
*/

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');