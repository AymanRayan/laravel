<?php

use App\Http\Controllers\creat;
use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('all/create',[userController::class,'create']);
Route::post('all/store',[userController::class,'store']);
Route::get('Login',[userController::class,'login'])->name('login');
Route::post('DoLogin',[userController::class,'dologin']);



Route::middleware(['checkLogin'])->group(function(){
    Route::get('all',[userController::class,'index']);
    Route::get('all/Remove/{id}',[userController::class,'delete']);
    Route::get('all/Edit/{id}',[userController::class,'edit']);
    Route::post('all/Update/{id}',[userController::class,'update']);
    Route::get('/all/logOut',[userController::class,'logOut']);
    // Route::resource('Blog',BlogController::class);
});