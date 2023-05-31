<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\JuradoController;
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
    Route::controller(JuradoController::class)->group(function () {
        Route::get('user-profile', 'userProfile');
        Route::post('logout-jurado',  'logout');
    });
    Route::resource('post/imagen',ImagenController::class)->except('update','destroy','show');
    Route::resource('categoria',CategoriaController::class)->except('update','destroy','show');
    Route::resource('post',PostController::class)->except('update','destroy');
    Route::resource('interaccion/comentario',ComentarioController::class)->except('update','destroy','show');
    Route::resource('interaccion/like',LikeController::class)->except('update','destroy','show');
    Route::resource('participante',ParticipanteController::class)->except('update','destroy');
});
Route::post('/login-jurado',[JuradoController::class,'login']);
