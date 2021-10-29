<?php

use App\Http\Controllers\ManyToManyController;
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

Route::get('/oneToMany', [OneToManyController::class, 'oneToMany'])->name('oneToMany.oneToMany');
Route::get('/manyToOne', [OneToManyController::class, 'manyToOne'])->name('oneToMany.manyToOne');
Route::get('/oneToManyTwo', [OneToManyController::class, 'oneToManyTwo'])->name('oneToMany.oneToManyTwo');
Route::get('/onToManyInsert', [OneToManyController::class, 'onToManyInsert'])->name('oneToMany.onToManyInsert');

Route::get('/hasmanyThrough', [OneToManyController::class, 'hasmanyThrough'])->name('oneToMany.hasmanyThrough');

Route::get('/manyToMany', [ManyToManyController::class, 'manyToMany'])->name('oneToMany.manyToMany');
Route::get('/manyToManyInverse', [ManyToManyController::class, 'manyToManyInverse'])->name('oneToMany.manyToManyInverse');
Route::get('/manyToManyInsert', [ManyToManyController::class, 'manyToManyInsert'])->name('oneToMany.manyToManyInsert');
