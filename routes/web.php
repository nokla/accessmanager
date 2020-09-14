<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HistoryController;

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
    return Redirect::route('dashboard');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('Dashboard.index');
    })->name('dashboard');

    route::resource('societe','App\Http\Controllers\SocieteController');
    route::get('addemployes/{id}',[SocieteController::class,'AddEmployes'])->name('addemployes');
    route::post('societeemploye',[SocieteController::class,'PostAddEmployes'])->name('postaddemployes');
    route::post('SearchSociete',[SocieteController::class,'SearchSociete'])->name('searchsociete');
    route::resource('user','App\Http\Controllers\UserController');

    route::resource('employe','App\Http\Controllers\EmployeController');
    route::post('SearchEmploye',[EmployeController::class,'SearchEmploye'])->name('searchemploye');

    route::get('history',[HistoryController::class,'index'])->name('history.index');
    route::get('PrinHistory',[HistoryController::class,'print'])->name('PrintHistory');
});

Route::post('login', [LoginController::class,'login'] )->name('postLogin');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('logout', function () {
    Auth::logout();
    return Redirect::route('login');
})->name('logout');

