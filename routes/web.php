<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');
Route::post('/deposit', [App\Http\Controllers\HomeController::class, 'depositPost'])->name('depositPost');
Route::get('/withdraw', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('withdraw');
Route::post('/withdraw', [App\Http\Controllers\HomeController::class, 'withdrawPost'])->name('withdrawPost');
Route::get('/transfer', [App\Http\Controllers\HomeController::class, 'transfer'])->name('transfer');
Route::post('/transfer', [App\Http\Controllers\HomeController::class, 'transferPost'])->name('transferPost');
Route::get('/statement', [App\Http\Controllers\HomeController::class, 'statement'])->name('statement');
