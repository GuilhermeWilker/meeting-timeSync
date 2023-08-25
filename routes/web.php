<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/guest', [GuestController::class, 'index'])->name('guest.view');

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [OrganizerController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/auth', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store'])->name('register');
