<?php

use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\ApiControllers\v1\Admin\CartApiController;
use App\Http\Controllers\ApiControllers\v1\Admin\TaskApiController;
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

//************************************
//Routes Of Login And Register
//************************************
Route::prefix('users/')->group(function (){
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::post('/logout' , [AuthController::class , 'logout'])->middleware('auth:sanctum');
});
//************************************


//************************************
//Routes Of Admin Dashbord
//************************************
Route::middleware('auth:sanctum')->prefix('v1')->group(function (){
     Route::apiResource('carts' , CartApiController::class);
     Route::apiResource('tasks',TaskApiController::class);
     Route::PUT('changetaskstatus/{id}' , [TaskApiController::class , 'changetaskstatus']);
});



