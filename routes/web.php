<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\PDFController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::view('add','addstudent');
//Route::get('tester','StudentController@View');
Route::get('/tester', [App\Http\Controllers\StudentController::class, 'view']);
Route::post('/insert', [App\Http\Controllers\StudentController::class, 'addStudent']);
Route::get('add-std', [App\Http\Controllers\StudentController::class, 'view'])->name('add-std');
Route::get('edit/{id}', [App\Http\Controllers\StudentController::class, 'Edit']);
Route::put('update/{id}', [App\Http\Controllers\StudentController::class, 'Update']);

//add-std
//Route::get('/export-excel', [App\Http\Controllers\StudentController::class, 'exportToExcel']);

//Route::get('/export-csv', [UserController::class,'export']);
Route::get('exe', [App\Http\Controllers\StudentController::class, 'export'])->name('exe');
Route::get('view-school', [App\Http\Controllers\StudentController::class, 'viewSchool'])->name('view-school');
Route::post('insert-school', [App\Http\Controllers\StudentController::class, 'addSchool']);
//insert-school

Route::post('goto-details', [App\Http\Controllers\StudentController::class, 'goToDetails'])->name('goto-details');

Route::get('delete/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('delete/{id}');
Route::get('download/{id}', [App\Http\Controllers\PDFController::class, 'Download'])->name('download/{id}');

Route::get('select-school', [App\Http\Controllers\StudentController::class, 'chooseSchool'])->name('select-school');

Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
