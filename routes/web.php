<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TextBlockController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [\App\Http\Controllers\WebController::class, 'index']);
Route::get('/lang/{lang}', [\App\Http\Controllers\WebController::class, 'lang']);
Route::get('/about', [\App\Http\Controllers\WebController::class, 'about']);
Route::get('/blog', [\App\Http\Controllers\WebController::class, 'blog']);
Route::get('/blog/{slug}', [\App\Http\Controllers\WebController::class, 'slug']);
Route::get('/post/{id}', [\App\Http\Controllers\WebController::class, 'item']);
Route::get('/services/{slug}', [\App\Http\Controllers\WebController::class, 'service']);
Route::get('/clients', [\App\Http\Controllers\WebController::class, 'clients']);

Route::post('/telegram', [\App\Http\Controllers\WebController::class, 'telegram']);
Route::get('/sitemap.xml', [\App\Http\Controllers\WebController::class, 'xml']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [\App\Http\Controllers\WebController::class, 'admin']);
    Route::resource('users', UserController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('posts', PostController::class);
    Route::resource('pages', PageController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('textblocks', TextBlockController::class);
    Route::get('settings', [SettingController::class, 'edit']);
    Route::put('settings/{id}', [SettingController::class, 'update'])->name("settings.update");
});



//Route::get('{resource}', [App\Http\Controllers\PostController::class, 'index']);
//Route::get('{resource}/create', [App\Http\Controllers\PostController::class, 'create']);
//Route::post('{resource}', [App\Http\Controllers\PostController::class, 'store']);
//Route::get('{resource}/{id}/edit', [App\Http\Controllers\PostController::class, 'edit']);
//Route::put('{resource}/{id}', [App\Http\Controllers\PostController::class, 'update']);
//Route::delete('{resource}/{id}', [App\Http\Controllers\PostController::class, 'destroy']);



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
