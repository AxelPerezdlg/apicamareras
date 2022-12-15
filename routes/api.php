<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::group(['middleware' => ["auth:sanctum"]], function (){
    Route::get('userProfile', [AuthController::class, 'userProfile']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::put('changePassword', [AuthController::class, 'changePassword']);
    Route::get('/room/getRoomByUser/{id}', [RoomController::class, 'getRoomByUser']);
    Route::get('/build/getBuildByUser', [BuildController::class, 'getBuildByUser']);
    Route::get('/room/getAllRoomByUser', [RoomController::class, 'getAllRoomByUser']);
    Route::put('/room/changeStatus/{id}', [RoomController::class, 'changeStatus']);
    Route::get('/history/index/{id}', [HistoryController::class, 'index']);




    Route::get('/observation/index', [ObservationController::class, 'index']);
    Route::post('/observation/store', [ObservationController::class, 'store']);
    Route::put('/observation/update/{id}', [ObservationController::class, 'update']);
    Route::get('/observation/show/{id}', [ObservationController::class, 'show']);


    Route::get('/room/index', [RoomController::class, 'index']);
    Route::post('/room/store', [RoomController::class, 'store']);
    Route::put('/room/update/{id}', [RoomController::class, 'update']);
    Route::get('/room/show/{id}', [RoomController::class, 'show']);

    Route::get('/build/index', [BuildController::class, 'index']);
    Route::post('/build/store', [BuildController::class, 'store']);
    Route::put('/build/update/{id}', [BuildController::class, 'update']);
    Route::get('/build/show/{id}', [BuildController::class, 'show']);


    Route::get('/service/index', [ServiceController::class, 'index']);
    Route::post('/service/store', [ServiceController::class, 'store']);
    Route::put('/service/update/{id}', [ServiceController::class, 'update']);
    Route::get('/service/show/{id}', [ServiceController::class, 'show']);


    
});

