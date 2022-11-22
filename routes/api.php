<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagePostController;
use App\Http\Controllers\PostController;

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

Route::post('auth/login', [AuthController::class, 'signin']);
Route::post('auth/register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('page/create', [PageController::class, 'store']);
    Route::post('page/{pageId}/attach-post', [PagePostController::class, 'store']);
    Route::post('person/attach-post', [PostController::class, 'store']);
});
