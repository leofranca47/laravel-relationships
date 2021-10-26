<?php

use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oneToOne', [OneToOneController::class, 'oneToOne'])->name('onetoOne.oneToOne');
Route::get('/oneToOneInverse', [OneToOneController::class, 'oneToOneInverse'])->name('onetoOne.oneToOneInverse');
Route::get('/oneToOneInsert', [OneToOneController::class, 'oneToOneInsert'])->name('onetoOne.oneToOneInsert');

Route::get('/oneToMany', [OneToManyController::class, 'oneToMany'])->name('oneToMany.OneToMany');
