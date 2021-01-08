<?php

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

Route::get('/',[\App\Http\Controllers\IndexPageController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('table/{user_name}/{tabel_id}', [\App\Http\Controllers\TableController::class , 'view_table'])->name('view_table');
Route::post('/create_table', [\App\Http\Controllers\TableController::class, 'create_table'])->name('create_table');
