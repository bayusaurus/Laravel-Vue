<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, GenreController, MovieController, NoteController, SubjectController};
use App\Http\Controllers\Api\LoginController;

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
Route::get('/search/{slug}', [MovieController::class, 'search']);
Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'movies'], function () {
    Route::get('', [MovieController::class, 'index']);
    Route::post('create-new-movie', [MovieController::class, 'store']);
    Route::get('title/{movie:slug}', [MovieController::class, 'show']);
    Route::put('{movie:slug}/edit', [MovieController::class, 'update']);
    Route::delete('{movie:slug}/delete', [MovieController::class, 'destroy']);
});
Route::group(['prefix' => 'genres'], function () {
    Route::get('', [GenreController::class, 'index']);
    Route::get('all', [GenreController::class, 'getAll']);
    Route::get('{slug}', [MovieController::class, 'getByGenre']);
});
Route::group(['prefix' => 'categories'], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('all', [CategoryController::class, 'getAll']);
    Route::get('{slug}', [MovieController::class, 'getByCategory']);
});

Route::group(['prefix' => 'notes'], function () {
    Route::get('', [NoteController::class, 'index']);
    Route::post('create-new-note', [NoteController::class, 'store']);
    Route::get('{subject:slug}/{note:slug}', [NoteController::class, 'show'])->name('notes.show');
    Route::patch('{subject:slug}/{note:slug}/edit', [NoteController::class, 'update']);
    Route::delete('{subject:slug}/{note:slug}/delete', [NoteController::class, 'destroy']);
});
Route::group(['prefix' => 'subjects'], function () {
    Route::get('', [SubjectController::class, 'index']);
});
