<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HistoryController;
use App\Models\Employe;

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
    Route::get('printemploye/{id}',[EmployeController::class,'PrintEmploye'])->name('employe.print');

    route::get('history',[HistoryController::class,'index'])->name('history.index');
    route::get('historysociete',[HistoryController::class,'HistorySociete'])->name('historysociete');
    route::post('historysociete',[HistoryController::class,'PostHistorySociete'])->name('posthistorysociete');
    route::get('printhistorysociete/{id}',[HistoryController::class,'PrintHistorySociete'])->name('printhistorysociete');
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

// Route::get('fixnaming', function () {
//     $employes = Employe::where("qrcode","like","%\r%")->get();

//     foreach ($employes as $item ) {
//         $qrcode = $item->qrcode;
//         $noise = ['\r','\n','\r\n'];
//         $newname = str_replace("\r\n","",$qrcode);
//         $newname = str_replace("/","\\",$newname);
//         $qrcode = str_replace("/","\\",$qrcode);
//         // dd($newname);
//         rename(base_path('public\\'.$qrcode),base_path('public\\'.$newname));
//         $item->qrcode=$newname;
//         $item->update();
//     }

//     return $newname;
// });

