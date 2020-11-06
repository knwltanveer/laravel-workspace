<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function() {

    Route::group(['prefix' => 'oauth'], function() {

        Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

        Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register')->middleware('age-check');

    });


    Route::group(['middleware'=>'auth:sanctum','prefix' => 'user'], function() {

        Route::put('/profile',[App\Http\Controllers\API\UserController::class, 'update_profile'])->middleware(['age-check','log-activity']);
        Route::get('/logs', [App\Http\Controllers\API\ActivityLogController::class, 'logActivityLists']);

    });

});

