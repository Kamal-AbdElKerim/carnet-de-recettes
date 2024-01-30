<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthContoller::class , "index"])->name('login');
Route::get('/Register', [AuthContoller::class , "Register"])->name('Register');

Route::get('/index', [UserContoller::class , "index"])->name('index');

Route::get('/singout', [UserContoller::class , "singout"])->middleware('auth')->name('singout');

Route::post('/store', [UserContoller::class , "store"])->name('store');

Route::post('/store/login', [UserContoller::class , "store_login"])->name('store.login');


Route::post('/store/post', [PostController::class , "store"])->name('add_post');

Route::post('/AjaxSearch', [PostController::class , "AjaxSearch"])->name('Ajax_Search');
