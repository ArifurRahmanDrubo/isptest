<?php

use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Sanctum\Sanctum;
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
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard');
//     Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'loginpage'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/registration', [UserController::class, 'registrationPage'])->name('registration');
    Route::post('/register', [UserController::class, 'registration'])->name('registration');
});


// Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard')->name('dashboard')->middleware('auth:sanctum');

Route::get('/home', [UserController::class, 'home'])->name('home');


// Route::fallback(function() {
//     return Inertia::render('Error');
// });

