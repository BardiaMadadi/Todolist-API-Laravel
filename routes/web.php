<?php

use App\Http\Controllers\ColumnController;
use App\Http\Controllers\RowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



// api prefix
Route::prefix('/api')->group(function (){

    Route::prefix('/v1')->group(function (){

        Route::prefix('/user')->group(function (){

            Route::get('/add/{username?}/{email?}/{pwd?}',[UserController::class,'add']);
            Route::get('/get/{id?}',[UserController::class,'get']);
            Route::get('/update',[UserController::class,'update']);

        });

        Route::prefix('/column')->group(function (){

            Route::get('/add/{title?}/{desc?}/{id?}',[ColumnController::class,'add']);
            Route::get('/get',[ColumnController::class,'get']);
            Route::get('/update',[ColumnController::class,'update']);


        });

        Route::prefix('/row')->group(function (){

            Route::get('/add/{title?}/{id?}',[RowController::class,'add']);
            Route::get('/get',[RowController::class,'get']);
            Route::get('/update',[RowController::class,'update']);


        });

    });

});
