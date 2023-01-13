<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
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

Route::resource('users', UserController::class);
Route::resource('sections', SectionController::class);
Route::resource('categories', CategoryController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('posts', PostController::class);

//Route::get('{resource}', [App\Http\Controllers\PostController::class, 'index']);
//Route::get('{resource}/create', [App\Http\Controllers\PostController::class, 'create']);
//Route::post('{resource}', [App\Http\Controllers\PostController::class, 'store']);
//Route::get('{resource}/{id}/edit', [App\Http\Controllers\PostController::class, 'edit']);
//Route::put('{resource}/{id}', [App\Http\Controllers\PostController::class, 'update']);
//Route::delete('{resource}/{id}', [App\Http\Controllers\PostController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
