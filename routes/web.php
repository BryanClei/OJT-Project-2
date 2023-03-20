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

    Route::get('/login/admin/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

    Route::get('/login/admin/viewprofile', 'viewprofile')->name('viewprofile')->middleware('auth');

    Route::put('/login/admin/updateprofile/{id}', 'update')->name('update');

    Route::post('/login/admin/updatepassword', 'updatepass')->name('updatepass');

    Route::get('/login/admin/updatepassword', 'updatepassword')->name('updatepassword');

    Route::get('/login/manager/manager', 'manager')->name('manager')->middleware('auth');

    Route::get('/login/manager/vmprofile', 'vmprofile')->name('vmprofile')->middleware('auth');

    Route::put('/login/manager/umprofile/{id}', 'updatemanager')->name('updatemanager');

    Route::get('/login/manager/mchangepassword', 'mchangepassword')->name('mchangepassword');

    Route::post('/login/admin/mchangepassword', 'mupdatepass')->name('mupdatepass');

    Route::get('/login/user/user', 'user')->name('user')->middleware('auth');

    Route::get('/login/user/vuprofile', 'vuprofile')->name('vuprofile')->middleware('auth');

    Route::put('/login/user/uuprofile/{id}', 'updateuser')->name('updateuser');

    Route::get('/login/user/uchangepassword', 'uchangepassword')->name('uchangepassword');

    Route::post('/login/user/uchangepassword', 'uupdatepass')->name('uupdatepass');
});

