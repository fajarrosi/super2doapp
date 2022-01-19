<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;



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
Route::get('gettask',[TodoController::class,'index']);
Route::post('addtask',[TodoController::class,'addTask']);
Route::post('updatetask',[TodoController::class,'updateTask']);
Route::post('deletetask',[TodoController::class,'deleteTask']);
Route::post('completedtask',[TodoController::class,'completedTask']);
Route::post('deletecompleted',[TodoController::class,'deleteCompleted']);
