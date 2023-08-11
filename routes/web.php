<?php

use App\Http\Controllers\GuestController;
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

Route::get('/', [GuestController::class, 'index'])->name('guest.view');

Route::get('/dashboard', [OrganizerController::class, 'index']);

Route::get('/auth', function () {
    return view('authView');
});

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store'])->name('register');
