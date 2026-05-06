<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\ApiUserController;
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

// Public API routes
Route::post('/login', [ApiAuthController::class, 'login']);

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/me', [ApiAuthController::class, 'me']);

    // Posts API routes
    Route::get('/posts', [ApiPostController::class, 'index']);
    Route::get('/posts/{post}', [ApiPostController::class, 'show']);
    Route::post('/posts', [ApiPostController::class, 'store']);

    // Users API routes
    Route::get('/users', [ApiUserController::class, 'index']);
    Route::get('/users/{user}', [ApiUserController::class, 'show']);
    Route::post('/users', [ApiUserController::class, 'store']);
});
