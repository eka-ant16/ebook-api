<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/book', [BookController::class, 'index']);
// Route::post('/book', [BookController::class, 'store']);
// Route::get('/book/{id}', [BookController::class, 'show']);
// Route::put('/book/{id}', [BookController::class, 'update']);
// Route::delete('/book/{id}', [BookController::class, 'destroy']);
Route::resource('book', BookController::class)->except('edit', 'create');
Route::resource('author', AuthorController::class)->except('edit', 'create');

//  login register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('book', BookController::class)->except('edit', 'create');
    Route::resource('author', AuthorController::class)->except('edit', 'create');
    Route::post('/logout', [AuthController::class, 'logout']);
});