<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonateScheduleController;
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
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::controller(DonateScheduleController::class)->middleware('auth')->group(function(){
    Route::get('donate','index');
    Route::post('donate','store');
    Route::get('donate/{schedule_id}','show');
    Route::post('donate/{schedule_id}','update');
    Route::get('donate/{schedule_id}','destroy');


});

