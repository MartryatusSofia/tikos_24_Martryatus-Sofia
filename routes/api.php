<?php

use App\Http\Controllers\Api\Admin\KonserController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\PesanTiket;
use App\Http\Controllers\Api\User\KonserController as UserKonserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::post('login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class,'register']);

Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::prefix('admin')->group(function(){
        Route::resource('konser', KonserController::class);
    });

    Route::post('beli-tiket', [PesanTiket::class, 'store']);

    
    Route::post('logout',[AuthController::class, 'logout']);
});

Route::get('konser',[UserKonserController::class, 'index']);
Route::get('konser/{id}',[UserKonserController::class, 'show']);
Route::get('konser/{id}',[KonserController::class, 'show']);

Route::get('beli-tiket', [PesanTiket::class, 'index']);