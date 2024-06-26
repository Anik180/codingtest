<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactioinController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/users',[UserController::class, 'store']);
Route::get('/users/create',[UserController::class, 'index'])->name('create.user');
Route::get('/transaction/create',[TransactioinController::class, 'index'])->name('create.transaction');
Route::post('/transactions',[TransactioinController::class, 'store'])->name('transactions.store');
