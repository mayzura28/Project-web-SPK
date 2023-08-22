<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerankinganController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', function () {
    return redirect('login');
});

//Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('index'); 

Auth::routes();

//Route::resource('/ranking', HomePageController::class);

//Route::get('/ranking', [App\Http\Controllers\HomePageController::class, 'ranking'])->name('ranking');

//Route::get('/resetbobot', [App\Http\Controllers\HomePageController::class, 'Bobot'])->name('Bobot');
Route::get('/panduan', [App\Http\Controllers\HomePageController::class, 'index'])->name('index'); 

Route::middleware('auth')->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index'); 

    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/perankingancoba', [App\Http\Controllers\PerankinganController::class, 'coba'])->name('coba');

    Route::get('/history', [App\Http\Controllers\PerankinganController::class, 'history'])->name('history');

    Route::get('/datakriteriaku', [App\Http\Controllers\KriteriaController::class, 'kriteria'])->name('kriteria');

    Route::get('/alternatifku', [App\Http\Controllers\AlternatifController::class, 'alternatif'])->name('alternatif');

    Route::get('/subkriteriaku', [App\Http\Controllers\SubKriteriaController::class, 'subkriteria'])->name('subkriteria');

    Route::get('/hasil', [App\Http\Controllers\PerankinganController::class, 'hasil'])->name('hasil');

    Route::resource('/datakriteria', KriteriaController::class);

    Route::resource('/subkriteria', SubKriteriaController::class);

    Route::resource('/alternatif', AlternatifController::class);

    Route::resource('/perankingan', PerankinganController::class);

    Route::get('/get_data/{id}', [App\Http\Controllers\AlternatifController::class, 'getdata'])->name('getdata({id})');

    Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
});


