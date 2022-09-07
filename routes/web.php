<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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

// Companies routes:

// Show all companies.
Route::get('/', [CompanyController::class, 'index']);

// Store company data.
Route::post('/companies', [CompanyController::class, 'store']);

// Show company create.
Route::get('/companies/create', [CompanyController::class, 'create'])
    ->middleware('auth');

// Show single company.
Route::get('/companies/{company}', [CompanyController::class, 'show']);


// Employees routes:

// Show all employees.
Route::get('/employees', [EmployeeController::class, 'index']);


// User routes:

// Show login form.
Route::get('/login', [UserController::class, 'login'])
    ->name('login');

// Login in user.
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log user out.
Route::post('/logout', [UserController::class, 'logout']);


