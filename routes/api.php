<?php


use App\Http\Controllers\Api\ProductionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
Route::group(['namespace' => 'api'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('/register',[CustomerController::class,'registration']);
        Route::post('/login', [CustomerController::class, 'login']);
    });
    Route::group(['prefix' => 'auth','middleware'=>'auth:api'], function () {
        Route::post('/logout', [CustomerController::class, 'logout']);
    });
    Route::group(['prefix' => 'movies', 'namespace' => 'movies','middleware'=>'auth:api'], function () {
    Route::get('/all-movies/{token}', [ProductionController::class, 'getAllProducts']);
    Route::get('/movies-pagination/{token}', [ProductionController::class, 'getProductsPagination']);
    Route::get('/get-top-five/{token}', [ProductionController::class, 'getTopFive']);
    Route::post('/add-favorite', [ProductionController::class, 'add_favorite_movie']);
    Route::post('/delete-favorite', [ProductionController::class, 'delete_movie']);
    Route::post('/list-favorite', [ProductionController::class, 'list_favorate']);
    Route::post('/search', [ProductionController::class, 'search']);
    Route::get('/details-movie/{movie_id}', [ProductionController::class, 'details_movies']);
    });
});



