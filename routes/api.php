<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeolocationController;
use App\Http\Controllers\Controller;


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

Route::post('send', [GeolocationController::class, 'send']);
Route::get('receive', [GeolocationController::class, 'receive']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
