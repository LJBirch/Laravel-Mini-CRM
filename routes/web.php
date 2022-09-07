<?php

use App\Http\Controllers\CompanyController;
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

// Show company index page.
Route::get('/', [CompanyController::class, 'index']);

// Show login form.
Route::get('/login', [UserController::class, 'login']);

// Login in user.
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
