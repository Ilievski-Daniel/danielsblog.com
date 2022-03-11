<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
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

// Post routes
Route::get('post', function () {
    return view('post');
});
Route::get('/add-post', [PostController::class, 'index']);
Route::post('/add-post', [PostController::class, 'insert']);
Route::get('/edit-post/{id}', [PostController::class, 'showEdits']);
Route::post('/edit-post/{id}', [PostController::class, 'update']);
Route::get('/post/{id}', [PostController::class, 'showPost']);

// Category routes
Route::get('/', [CategoryController::class, 'homeNavigation']);
Route::get('/add-category', function () {
    return view('add-category');
});

Route::get('/all-posts', [CategoryController::class, 'index']);
Route::post('/add-category', [CategoryController::class, 'insert']);
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{id}', [CategoryController::class, 'showEdits']);
Route::post('/edit-category/{id}', [CategoryController::class, 'update']);

// Admin Panel routes
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin', [AdminController::class, 'show']);
Route::delete('/delete-post/{id}', [PostController::class, 'destroy']);

// Contact page route
Route::get('contact', [CategoryController::class, 'contactNavigation']);

// Comment routes
Route::post('/post/{id}', [CommentController::class, 'store']);
Route::delete('/delete-comment/{id}/{post_id}', [CommentController::class, 'destroy']);
Route::post('/edit-comment/{id}', [CommentController::class, 'update']);
Route::get('/edit-comment/{id}', [CommentController::class, 'show']);