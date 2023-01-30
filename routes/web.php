<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
    Route::controller(AdminController::class)->group(function (){
        Route::get('', 'index')->name('index');
    });
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/post', [PostController::class, 'store'])->name('store');
});

// POST
Route::prefix('post')->name('post.')->group(function (){
    Route::controller(PostController::class)->group(function (){
       Route::get('{post}', 'show')->name('show');
    });
});
