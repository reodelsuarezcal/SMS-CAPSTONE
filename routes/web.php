<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\EventCalendarController;

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
Route::get('/search-patient', [App\Http\Controllers\PatientController::class, 'searchPatient'])->name('patient.search');
Route::get('/table-2', [App\Http\Controllers\PatientController::class, 'tableTwo'])->name('table.two');



//CRUD OPERATIONS PARENTS
Route::post('/store-parent', [App\Http\Controllers\ParentController::class, 'store'])->name('add.parent');
Route::get('/parents-data', [App\Http\Controllers\ParentController::class, 'parentIndex'])->name('parent.index');
Route::put('/update-parent/{id}/update', [App\Http\Controllers\ParentController::class, 'updateParent'])->name('parent.update');
Route::delete('/parent/{id}/delete', [App\Http\Controllers\ParentController::class, 'destroy'])->name('parent.delete');
Route::get('/search-parent', [App\Http\Controllers\ParentController::class, 'searchParent'])->name('parent.search');


//CALENDAR

Route::get('fullcalender', [EventCalendarController::class, 'index']);
Route::post('fullcalenderAjax', [EventCalendarController::class, 'ajax']);
// Route::get('/calendar', [EventCalendarController::class, 'index'])->name('calendar');
// Route::get('/events', 'EventCalendarController@index'); // Fetch all events
// Route::post('/events', [EventCalendarController::class, 'store']);
// Route::put('/events/{id}', 'EventCalendarController@update'); // Update an event
// Route::delete('/events/{id}', 'EventCalendarController@destroy'); // Delete an event



});