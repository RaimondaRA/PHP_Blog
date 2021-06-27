<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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

// Route::get('/', [TestController::class,'index']); //jei ateiname i pagr. psl, kreipiames i Controller ir jo index
// Route::get('/user', [TestController::class,'getUser']); //sukuriamas papildomas route

Route::get('/', [BlogController::class,'index']); //kai ateiname i puslapi, grazinamas index controller'is
Route::get('/add-post', [BlogController::class, 'createPost']); //grazins reikalinga forma
Route::post('/store', [BlogController::class, 'store']);
Route::get('/post/{post}', [BlogController::class, 'show']); //parametras {post} turi sutapti su kintamuoju $post. BlogController 31 eilute
Route::get('/delete/{post}', [BlogController::class, 'destroy']);
Route::get('/update/{post}', [BlogController::class, 'update']);
Route::patch('/storeupdate/{post}', [BlogController::class, 'storeupdate']);
Route::post('/post/{post}/comment', [CommentController::class, 'addComment']);

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
