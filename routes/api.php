<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\PostController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\LoginController;
use App\Http\Controllers\v1\CommentController;
use App\Http\Controllers\v1\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// public
Route::get('/v1/posts', [PostController::class, 'index']);
Route::get('/v1/post/{id}', [PostController::class, 'show']);
Route::get('/v1/categories', [CategoryController::class, 'index']);
Route::get('/v1/user/{id}', [UserController::class, 'show']);
Route::get('/v1/comments', [CommentController::class, 'getCommentsByPostId']);

// auth
Route::post('/v1/register', [LoginController::class, 'register']);
Route::post('/v1/login', [LoginController::class, 'login'])->name('login');
Route::post('/v1/logout', [LoginController::class, 'logout'])->middleware('auth:api');
Route::get('/v1/me', [LoginController::class, 'me'])->middleware('auth:api');

// private
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/v1/user/update_profile', [UserController::class, 'updateMyProfile']);
    Route::post('/v1/post/create', [PostController::class, 'create']);
    Route::post('/v1/comment/create', [CommentController::class, 'create']);
});



