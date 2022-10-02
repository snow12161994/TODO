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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/todo/{loader}', function($Load)
// {
//     return 'HI' . $Load;
// });


Route::get('/todo', [TodoController::class , 'index']);
Route::get('/todo/{id}',[TodoController::class, 'show']);
Route::post('/todo/add', [TodoController::class, 'store']);
Route::patch('/todo/update/{id}',[TodoController::class, 'update']);
Route::delete('/todo/delete/{id}',[TodoController::class, 'destroy']);