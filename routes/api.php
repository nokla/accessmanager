<?php

use Illuminate\Http\Request;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/employe/{cin}',[EmployeController::class,'getEmploye']);

Route::middleware('api')->get('/employe/{cin}/{idSociete}',[HistoryController::class,'Checkin']);

Route::middleware('api')->post('/checklogin',[UserController::class,'checklogin']);