<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebControllers\Admin\CartWebController;
use App\Http\Controllers\WebControllers\Admin\TaskWebController;
use App\Http\Controllers\WebControllers\Admin\UserWebController;
use App\Http\Controllers\WebControllers\IndexController;
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

Route::middleware('auth')->group(function (){
    Route::get('/' , [IndexController::class , 'index'])->name('index');
    Route::put('/changestatus/{id}' , [IndexController::class , 'changetaskstatus'])->name('changetaskstatus');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//************************************
//Routes Of Admin Dashbord
//************************************
Route::middleware(['auth' , 'isadmin'])->prefix('dashbord')->group(function () {
    Route::resource('carts' , CartWebController::class);
    Route::resource('tasks',TaskWebController::class)->except('index' , 'show');
});
