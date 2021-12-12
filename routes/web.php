<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page Routes
Route::get('/', [HomeController::class, 'home'])
->name('home')
//  ->middleware('auth')
;
    
// Static Page Routes
Route::get('/static', AboutController::class)->name('static');

// Resource Controller Routes
Route::resource('/student', StudentController::class);

Route::resource('/departments', DepartmentController::class);


// Route::prefix('/student')->name('student.')->group(function () use($products){

// });

//Authentication
Auth::routes();