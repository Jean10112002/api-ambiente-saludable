<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $rulesCalificacion = array(

        'contenido' => 'required|numeric',
        'organizacion_estatica' => 'required|numeric',
        'creatividad' => 'required|numeric',
        'tecnica' => 'required|numeric',
    );
    public $mensajes = array(

        'contenido.required' => 'Se requiere que llene el campo.',
        'contenido.numeric' => 'Solo numeros.',
        'organizacion_estatica.required' => 'Se requiere que llene el campo.',
        'organizacion_estatica.numeric' => 'Solo numeros.',
        'creatividad.required' => 'Se requiere que llene el campo.',
        'creatividad.numeric' => 'Solo numeros.',
        'tecnica.required' => 'Se requiere que llene el campo.',
        'tecnica.numeric' => 'Solo numeros.',





    );
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $usuario = Auth::guard('sanctum')->user();
            if ($usuario->rol !== 'jurado') {
                return response()->json(["
            error" => "no autorizado"], 403);
            }

            $validator = Validator::make($request->all(), $this->rulesCalificacion, $this->mensajes);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return response()->json([
                    'messages' => $messages
                ], 500);
            };

            $usuario = Auth::guard('sanctum')->user();
            $calificacion = Calificacion::create([
                'contenido' => $request->contenido,
                'organizacion_estatica' => $request->organizacion_estatica,
                'creatividad' => $request->creatividad,
                'tecnica' => $request->tecnica,
                'post_id' => $request->post_id,
                'user_id' => $usuario->id,
                $total = (($request->contenido * 0.30) + ($request->organizacion_estatica * 0.25) + ($request->creatividad * 0.20) + ($request->tecnica * 0.25)),
                'total' => $total
            ]);
            Post::find($request->post_id)->update(["estado"=>1]);
            return response()->json(['Message' => 'Se registro las calificaciones :', 'Calificacion' => $calificacion, 'Total' => $total]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
    public function calificacionReporte()
    {
        $categorias = Categoria::with(['Post' => function($query){
            $query->orderBy('calificacionFinal', 'desc');
        },'Post.Participante', 'Post.Calificacion', 'Post.Calificacion.User'])
            ->get();
        $mayorLikesComentarios = Post::with('Participante')->withCount(['Like', 'Comentario_Post'])
            ->orderBy('like_count', 'desc')
            ->orderBy('comentario__post_count', 'desc')
            ->get();

        foreach ($categorias as $c) {
            $posts = $c->Post;
            foreach ($posts as $post) {
                $promedioCalificaciones = $post->Calificacion->avg('total');
                $post->calificacionFinal = $promedioCalificaciones;
                $post->save();
            }
            $c->save();
        }
        return response()->json([
            "Categorias" => $categorias,
            "mayorLikesComentarios" => $mayorLikesComentarios
        ]);
    }
}
