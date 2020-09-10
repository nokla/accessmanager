<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
    route::resource('societe','App\Http\Controllers\SocieteController');
    route::resource('user','App\Http\Controllers\UserController');
    route::resource('employe','App\Http\Controllers\EmployeController');
});

Route::post('login', [LoginController::class,'login'] )->name('postLogin');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('logout', function () {
    Auth::logout();
    return Redirect::route('login');
})->name('logout');

