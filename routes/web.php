<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommitmentController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/login', [AuthContoller::class , "index"])->name('login');
Route::get('/Register', [AuthContoller::class , "Register"])->name('Register');

Route::get('/', [UserContoller::class , "index"])->name('index');

Route::get('/singout', [UserContoller::class , "singout"])->middleware('auth')->name('singout');


Route::post('/store', [UserContoller::class , "store"])->name('store');

Route::post('/store/login', [UserContoller::class , "store_login"])->name('store.login');


Route::post('/store/post', [PostController::class , "store"])->middleware('auth')->name('add_post');
Route::get('/post/delete_post/{id}', [PostController::class , "destroy"])->middleware('auth')->name('delete_post');
Route::get('/post/update_post/{id}', [PostController::class , "edit"])->middleware('auth')->name('update_post');
Route::post('/post/updatePost/{id}', [PostController::class , "update"])->middleware('auth')->name('updatePost');

Route::get('/Single_post/{id}', [PostController::class , "show"])->name('Single_post');


Route::post('/AjaxSearch', [PostController::class , "AjaxSearch"])->name('Ajax_Search');


Route::post('/add-comment/{postId}', [CommitmentController::class , "addComment"])->name('add_comment');
Route::delete('/delete-comment/{commentId}', [CommitmentController::class , "delete"])->name('delete.comment');
Route::put('/update-comment/{commentId}', [CommitmentController::class , "updateComment"])->name('update.comment');


Route::get('/comments/json/{postId}', [CommitmentController::class , "getCommentsJson"])->name('comments.json');
// Route::get('/data.commit', [CommitmentController::class , "data_commit"])->name('data.commit');


