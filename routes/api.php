<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\it;
use App\Http\Controllers\ticket;

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

Route::post('/auth_login', [login::class, 'submitLogin']);
Route::get('/get_ticket', [ticket::class, 'api_ticket']);
Route::get('/get_it', [it::class, 'edit']);
Route::get('/suhu/{suhu}/{humid}', [it::class, 'suhu_komp']);
Route::get('/get_temp', [it::class, 'get_suhu_komp']);
