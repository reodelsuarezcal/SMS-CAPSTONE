<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ParentController;

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
Route::get('/add-patient', [App\Http\Controllers\PatientController::class, 'addIndex'])->name('add.index');
Route::get('/table', [App\Http\Controllers\PatientController::class, 'index'])->name('table');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//CRUD OPERATIONS PATIENTS
Route::post('/upload-patient', [App\Http\Controllers\PatientController::class, 'store'])->name('store.patient');
Route::get('/view-profile/{id}', [App\Http\Controllers\PatientController::class, 'viewProfile'])->name('view.profile');
Route::get('/edit-patient/{id}', [App\Http\Controllers\PatientController::class, 'editIndex'])->name('edit.index');
Route::put('/patient/{id}/edit', [App\Http\Controllers\PatientController::class, 'update'])->name('patient.update');
Route::delete('/patient/{id}/delete', [App\Http\Controllers\PatientController::class, 'destroy'])->name('patient.delete');

//CRUD OPERATIONS PARENTS
Route::post('/store-parent', [App\Http\Controllers\ParentController::class, 'store'])->name('add.parent');

});