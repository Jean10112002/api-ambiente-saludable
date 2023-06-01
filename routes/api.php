<?php

use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\PostController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    Route::controller(UserController::class)->group(function () {
        Route::get('user-profile', 'userProfile');
        Route::post('logout-jurado',  'logout');
    });
    Route::apiResource('interaccion/comentario',ComentarioController::class)->only('index');
    Route::apiResource('participante',ParticipanteController::class)->only('show','index');
    Route::apiResource('categoria',CategoriaController::class)->except('update','destroy','show');
    Route::apiResource('post',PostController::class)->only('index');
    Route::apiResource('interaccion/like',LikeController::class)->only('store');
    Route::apiResource('post/imagen',ImagenController::class)->only('store');
    Route::apiResource('calificaciones',CalificacionController::class)->only('store');
});
Route::post('/login-jurado',[UserController::class,'login']);

