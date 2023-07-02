<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [UserController::class, 'loginUser']);
Route::post('/auth/register', [UserController::class, 'createUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', \App\Http\Controllers\Api\PostController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', \App\Http\Controllers\Api\CategoryController::class);
