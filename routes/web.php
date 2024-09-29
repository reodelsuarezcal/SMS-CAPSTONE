<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/table', [App\Http\Controllers\TableController::class, 'index'])->name('table');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});