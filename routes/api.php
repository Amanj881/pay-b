<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\UserController;
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


// Route::group(['prefix' => 'admin'],function ()
// {

// 	Route::post('/login',[AdminController::class,'login']);	
// });

Route::group([

    'prefix' => 'admin'

], function ($router) {
	Route::post('register', [AdminController::class,'create']);
    Route::post('login', [AdminController::class,'login']);
    Route::post('logout', [AdminController::class,'logout']);
    Route::post('refresh', [AdminController::class,'refresh']);
    Route::post('me', [AdminController::class,'me']);
    Route::post('addUser', [AddUserController::class,'addUser']);
    Route::get('getUser', [AddUserController::class,'getUser']);


});
Route::group([

    'prefix' => 'user'

], function ($router) {
	// Route::post('register', [AdminController::class,'create']);
    Route::post('login', [UserController::class,'login']);
 //    Route::post('logout', [AdminController::class,'logout']);
 //    Route::post('refresh', [AdminController::class,'refresh']);
 //    Route::post('me', [AdminController::class,'me']);
 //     Route::post('addUser', [AddUserController::class,'addUser']);


});
