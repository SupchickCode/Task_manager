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

# Table routes
Route::get('table/{user_name}/{table_id}', [\App\Http\Controllers\TableController::class , 'view_table'])->name('view_table');
Route::post('/create/table', [\App\Http\Controllers\TableController::class, 'create_table'])->name('create_table');
Route::post('/delete/table/{table_id}', [\App\Http\Controllers\TableController::class, 'delete_table'])->name('delete_table');

# Task routes
Route::post('create/task/to/{table_id}', [\App\Http\Controllers\TaskController::class, 'create_task'])->name('create_task');
Route::post('add/task/to/{task_id}', [\App\Http\Controllers\TaskController::class, 'add_text_task'])->name('add_text_task');
Route::post('remove/task/{task_id}', [\App\Http\Controllers\TaskController::class, 'remove_task'])->name('remove_task');
Route::post('done/task/{task_id}', [\App\Http\Controllers\TaskController::class, 'done_task'])->name('done_task');