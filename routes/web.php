<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('home');
});

// login
Route::get('register', [AuthenticationController::class, 'register']);
Route::get('login', [AuthenticationController::class, 'login']);

// dashboard
Route::get('dashboard', [DashboardController::class, 'index']);

// student
route::resource('student', StudentController::class);

// classrooms
route::resource('classroom', ClassroomController::class);