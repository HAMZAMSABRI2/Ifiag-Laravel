<?php

use App\Http\Controllers\Api\AuthController;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test-api', function(){
    return Response()->json([
        'message'=>"hi"
    ]);
})->middleware('auth:api');

Route::get("not-login", function(){
    return Response()->json([
        'message'=>"user not found"
    ]);
})->name('not-login');

Route::post('register', [AuthController::class, 'register'])->name('register');

