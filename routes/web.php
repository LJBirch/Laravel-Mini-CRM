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
Route::post('/companies', [CompanyController::class, 'store'])
    ->middleware('auth');

// Show company create.
Route::get('/companies/create', [CompanyController::class, 'create'])
    ->middleware('auth');

// Show edit company.
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])
    ->middleware('auth');

// Update company data.
Route::put('/companies/{company}', [CompanyController::class, 'update'])
    ->middleware('auth');

// Delete company data.
Route::delete('/companies/{company}', [CompanyController::class, 'delete'])
    ->middleware('auth');

// Show single company.
Route::get('/companies/{company}', [CompanyController::class, 'show']);


// Employees routes:

// Show all employees.
Route::get('/employees', [EmployeeController::class, 'index'])
    ->middleware('auth');

// Store employee data.
Route::post('/employees', [EmployeeController::class, 'store'])
    ->middleware('auth');

// Show employee create.
Route::get('/employees/create', [EmployeeController::class, 'create'])
    ->middleware('auth');

// Show edit employee.
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])
    ->middleware('auth');

// Update employee data.
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])
    ->middleware('auth');

// Delete employeee data.
Route::delete('/employees/{employee}', [EmployeeController::class, 'delete'])
    ->middleware('auth');


// Show single employee.
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])
    ->middleware('auth');;


// User routes:

// Show login form.
Route::get('/login', [UserController::class, 'login'])
    ->name('login');

// Login in user.
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log user out.
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');;


