<?php

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

        });

    });

});
