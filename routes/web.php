<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.homepage');
Route::get('signup', [UserController::class, 'signup'])->name('user.signup');
Route::get('login', [UserController::class, 'login'])->name('user.login');


// USER
Route::resource('user', UserController::class)->except(['index', 'create']);
Route::post('login', [UserController::class, 'loginUser'])->name('user.loginUser');
