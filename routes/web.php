<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\logincontroller;
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
    return view('welcome');
});

Route::controller(logincontroller::class)->group(function(){
    Route::get('welcome', 'index')->name('login');

    Route::get('/login/register', 'register')->name('register');

    Route::get('logout', 'logout')->name('logout');

    Route::post('/validate_registration', 'validate_registration')->name('login.validate_registration');

    Route::post('/validate_login', 'validate_login')->name('welcome.validate_login');

    Route::get('/login/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

    Route::get('/login/manager', 'manager')->name('dashboard')->middleware('auth');

    Route::get('/login/user', 'user')->name('dashboard')->middleware('auth');
});

