<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ToolController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register',[ApiTokenController::class,'register']);
Route::post('auth/login',[ApiTokenController::class,'login']);
Route::middleware('auth:sanctum')->post('tools/create', [ToolController::class,'store']);

Route::get('tools',[ToolController::class,'index']);

