<?php

use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Comentario_Post;
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

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::apiResource('comentarios', ComentarioController::class)->only('index');
    Route::apiResource('categoria', CategoriaController::class)->only('index');
    Route::apiResource('participante', ParticipanteController::class)->only('show', 'index');
    Route::get('participante/search/{cedula}', [ParticipanteController::class, 'showByCedula']);
    Route::apiResource('post/imagen', ImagenController::class)->only('store'); //*TODO solo participante
    Route::apiResource('post', PostController::class)->only('index', 'store', 'destroy'); //*TODO solo participante store y solo admin destroy
    Route::get('post/search-categoria/{id}', [PostController::class, 'showCategoria']);
    Route::get('post/search-sincalificar', [PostController::class, 'postSinCalificarSinCategoria']); //*TODO solo jurado
    Route::get('post/search-categoria-sincalificar/{id}', [PostController::class, 'postSinCalificarConCategoria']);//*TODO solo jurado
    Route::apiResource('interaccion/comentario', Comentario_Post::class)->only('store'); //*TODO solo participante
    Route::apiResource('interaccion/like', LikeController::class)->only('store', 'destroy'); //*TODO solo participante
    Route::apiResource('calificacion', CalificacionController::class)->only('store');//*TODO solo jurado


    Route::controller(UserController::class)->group(function () {
        Route::get('user-profile', 'userProfile');
        Route::post('logout-jurado',  'logout');
    });
});
Route::post('/login-jurado', [UserController::class, 'login']);
Route::get('calificacion/reporte', [CalificacionController::class, 'calificacionReporte']);
